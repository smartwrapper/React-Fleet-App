<?php

namespace App\Services\Admin;

use App\Models\Admin\Account;
use App\Traits\ApiResponser;
use DB;
use App\Models\Web\Cart;
use App\Models\Admin\Inventory;
use App\Models\Web\OrderDetail;
use App\Services\Admin\AvailableQty;
use Illuminate\Support\Facades\Gate;
use App\Models\Web\CouponOrder;
use App\Models\Admin\CouponSetting;
use App\Models\Admin\DefaultAccount;
use App\Models\Admin\PaymentMethodSetting;
use App\Models\Admin\Product;
use App\Models\Admin\Transaction;
use App\Models\Admin\TransactionDetail;
use App\Models\Admin\Warehouse;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Auth;

class OrderService
{
    use ApiResponser;
    public function CheckStock($customer_id)
    {
        $sql = $this->getCartItemQty($customer_id);
        $totalPrice = 0;
        foreach ($sql as $data) {
            if (!Gate::allows('isDigital')) {
                $totalPrice = $totalPrice + (($data->prices - $data->discounts) * $data->qty);
                $qtyValidation = new AvailableQty;
                $qtyValidation = $qtyValidation->availableQty($data->product_id, $data->product_combination_id, $data->qty);
                if (!$qtyValidation) {
                    return $this->errorResponseArray('Out of Stock!', 422, $data);
                }
            } else {
                $totalPrice = $totalPrice + ($data->prices - $data->discounts);
            }
        }
        return $this->successResponseArray($totalPrice, 'Order Save Successfully!');
    }

    public function getCartItemQty($customer_id)
    {
        $sql = Cart::type()->customerId($customer_id)->where('is_order', '0');
        $sql = $sql->availableQtys()->get();
        $sql = $sql->unique();
        return $sql;
    }

    public function orderDetail($sql, $order)
    {
        $products = $productsPoint = [];
        foreach ($sql as $data) {
            $totalPrice = 0;
            if (!Gate::allows('isDigital'))
                $totalPrice = $totalPrice + (($data->prices - $data->discounts) * $data->qty);
            else
                $totalPrice = $totalPrice + (($data->prices - $data->discounts));

            $parms['total'] = $totalPrice;
            $parms['product_price'] = $data->prices;
            $parms['product_discount'] = $data->discounts;
            $parms['product_id'] = $data->product_id;
            $parms['product_combination_id'] = $data->product_combination_id;
            $parms['qty'] = $data->qty;
            $parms['product_tax'] = 0;
            $parms['order_id'] = $order->id;
            OrderDetail::create($parms);
            $products[] = $parms['product_price'] * $parms['qty'];
            $productsPoint[] = Product::productId($parms['product_id'])->value('is_points');
            if (!Gate::allows('isDigital'))
                $this->RemoveOrderInventory($parms);
        }
        $points = new PointService;
        $points->orderPoints($products, $productsPoint, $order->customer_id, $order->id);
        $this->RemoveCartItem($order->customer_id);
        return 1;
    }

    public function RemoveOrderInventory($parms)
    {
        $defaultWareHouse =  Warehouse::isDefault()->value('id');
        $parms['warehouse_id'] = $defaultWareHouse;
        $parms['stock_status'] = 'OUT';
        $parms['stock_type'] = 'Order';
        // $parms['created_by'] = Auth::id();
        $parms['reference_id'] = $parms['order_id'];
        $inventory = new Inventory;
        $inventory->unsetEventDispatcher();
        $inventory = $inventory->create($parms);
    }


    public function RemoveCartItem($customer_id)
    {
        Cart::type()->where('customer_id', $customer_id)->update(['is_order' => '1']);
    }


    public function CartItemValidation($params)
    {
        $customer =  Auth::id();
        if(isset($params['customer_id']))
            $customer = $params['customer_id'];
        return Cart::type()->where('customer_id',$customer)->where('is_order', '0')->count();
    }


    public function CouponCodeValidation($coupon_code, $customer_id, $auth_check)
    {
        if ($auth_check) {
            $num_of_usage = CouponOrder::customer($customer_id)->coupon($coupon_code)->value('num_of_usage');
        } else {
            $num_of_usage = 0;
        }
        
        $sql = CouponSetting::where('code', $coupon_code)->where('expiry_date', '>=', date('Y-m-d'))->first();
        if (!$sql) {
            return $this->errorResponseArray('Coupon Code is Expired!');
        }
        if (intval($sql->usage_limit_per_user) <= intval($num_of_usage)) {
            return $this->errorResponseArray('User Usage Lmit Exceed!');
        }
        if (intval($sql->usage_limit_per_coupon) <= intval($num_of_usage)) {
            return $this->errorResponseArray('Coupon Usage Lmit Exceed!');
        }
        return $this->successResponseArray($sql, 'Coupon Varified!');
    }


    public function paymentMethod($payment_method, $cc_number, $cc_month, $cc_year, $cc_cvc, $amount)
    {
        if ($payment_method == 'stripe') {
            $payment = PaymentMethodSetting::where('payment_method_id',2)->get();
            $stripe = Stripe::setApiKey(isset($payment[0]->value) ? $payment[0]->value : '');
            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $cc_number,
                        'exp_month' => $cc_month,
                        'exp_year' => $cc_year,
                        'cvc' => $cc_cvc,
                    ],
                ]);
                if (!isset($token['id'])) {
                    return $this->errorResponseArray('Some credential are not correct!');
                }
                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => 'USD',
                    'amount' => $amount,
                    'description' => 'wallet',
                ]);

                if ($charge['status'] == 'succeeded') {
                    return $this->successResponseArray('', 'Success');

                } else {
                    return $this->errorResponseArray('Money not add in wallet!!');
                }
            } catch (Exception $e) {
                return $this->errorResponseArray($e);
            }
        }
    }

    public function CompleteTransaction($order, $customer_id)
    {
        $default_account = DefaultAccount::pluck('account_id', 'type')->toArray();
        $account_id = Account::where('type', 'customer')->where('reference_id', $customer_id)->value('id');
        if (!$account_id) {
            $account_id = $default_account['customer'];
        }
        $inc = Transaction::latest()->value('transaction_number');
        $inc = intVal($inc);
        $inc++;
        $trans_id = Transaction::create([
            'transaction_number' => $inc,
            'transaction_date' => date('Y-m-d'),
            'description' => 'order sale item'
        ]);
        TransactionDetail::create([
            'transaction_id' => $trans_id->id,
            'account_id' => $default_account['cash'],
            'user_id' => $order->customer_id,
            'reference_id' => $order->id,
            'type' => 'cash',
            'dr_amount' => $order->order_price,
            'cr_amount' => '0'
        ]);

        TransactionDetail::create([
            'transaction_id' => $trans_id->id,
            'account_id' => $default_account['tax'],
            'user_id' => $order->customer_id,
            'reference_id' => $order->id,
            'type' => 'sale',
            'dr_amount' => '0',
            'cr_amount' => $order->total_tax
        ]);
        TransactionDetail::create([
            'transaction_id' => $trans_id->id,
            'account_id' => $default_account['couponcode'],
            'user_id' => $order->customer_id,
            'reference_id' => $order->id,
            'type' => 'sale',
            'dr_amount' => '0',
            'cr_amount' => $order->coupon_amount
        ]);
        TransactionDetail::create([
            'transaction_id' => $trans_id->id,
            'account_id' => $default_account['shipping'],
            'user_id' => $order->customer_id,
            'reference_id' => $order->id,
            'type' => 'sale',
            'dr_amount' => '0',
            'cr_amount' => $order->shipping_cost
        ]);

        $remaining = intVal($order->order_price) - intVal($order->total_tax) - intVal($order->coupon_amount) - intVal($order->shipping_cost);

        TransactionDetail::create([
            'transaction_id' => $trans_id->id,
            'account_id' => $default_account['sale'],
            'user_id' => $order->customer_id,
            'reference_id' => $order->id,
            'type' => 'sale',
            'dr_amount' => '0',
            'cr_amount' => $remaining
        ]);
    }


    public function revertOrderProductsQuantity($order){
        $orderDetail = OrderDetail::where('order_id',$order->id)->get();
        foreach($orderDetail as $orderdtl){
            Inventory::insertOrIgnore([
                'product_id' => $orderdtl->product_id,
                'product_combination_id' => $orderdtl->product_combination_id,
                'warehouse_id' => '1',
                'stock_status' => 'IN',
                'qty' => $orderdtl->qty,
                'reference_id' => $order->id,
                'stock_type' => 'Order',
                'updated_by' => \Auth::id(),
                'updated_at' => \Carbon\Carbon::now(),

            ]);
        }
    }
}
