<?php

namespace App\Repository\Admin;

use App\Contract\Admin\OrderInterface;
use App\Http\Resources\Admin\Order as OrderResource;
use App\Models\Admin\Account;
use App\Models\Admin\DefaultAccount;
use App\Models\Admin\Transaction;
use App\Models\Admin\TransactionDetail;
use App\Models\Web\Order;
use App\Models\Admin\Language;
use App\Models\Web\OrderHistory;
use App\Services\Admin\OrderService;
use App\Traits\ApiResponser;
use App\Models\Admin\OrderNote;
use App\Models\Admin\OrderComment;
use Illuminate\Support\Collection;
use Auth;

class OrderRepository implements OrderInterface
{
    use ApiResponser;
    public function all()
    {
        try {
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            $order = new Order;
            if (isset($_GET['orderDetail']) && $_GET['orderDetail'] == '1') {
                $order = $order->with('detail');
                $order = $order->with('detail.product_combination');
            }
            $languageId = Language::defaultLanguage()->value('id');
            if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                $language = Language::languageId($_GET['language_id'])->firstOrFail();
                $languageId = $language->id;
            }
            if (isset($_GET['productDetail']) && $_GET['productDetail'] == '1') {
                $order = $order->getProductDetailByLanguageId($languageId);
            }
            if (isset($_GET['customer']) && $_GET['customer'] == '1') {
                $order = $order->with('customer');
            }
            if (isset($_GET['currency']) && $_GET['currency'] == '1') {
                $order = $order->with('currency');
            }
            if (isset($_GET['billing_country']) && $_GET['billing_country'] == '1') {
                $order = $order->with('billing_country');
            }
            if (isset($_GET['billing_state']) && $_GET['billing_state'] == '1') {
                $order = $order->with('billing_state');
            }
            if (isset($_GET['delivery_country']) && $_GET['delivery_country'] == '1') {
                $order = $order->with('delivery_country');
            }
            if (isset($_GET['delivery_state']) && $_GET['delivery_state'] == '1') {
                $order = $order->with('delivery_state');
            }
            if (isset($_GET['pending_orders']) && $_GET['pending_orders'] == '1') {
                $order = $order->getOrderByStatus('Pending');
            }
            if (isset($_GET['complete_orders']) && $_GET['complete_orders'] == '1') {
                $order = $order->getOrderByStatus('Complete');
            }
            if (isset($_GET['return_orders']) && $_GET['return_orders'] == '1') {
                $order = $order->getOrderByStatus('Return');
            }
            if (isset($_GET['cancel_orders']) && $_GET['cancel_orders'] == '1') {
                $order = $order->getOrderByStatus('Cacnel');
            }
            if (isset($_GET['order_shipped']) && $_GET['order_shipped'] == '1') {
                $order = $order->getOrderByStatus('Shipped');
            }
            if (isset($_GET['customer_id']) && $_GET['customer_id'] != '') {
                $order = $order->getCustomerOrders($_GET['customer_id']);
            }

            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $order = $order->searchParameter($_GET['searchParameter']);
            }
            
            if (isset($_GET['date_from']) && $_GET['date_from'] != '' && isset($_GET['date_to']) && $_GET['date_to'] != '') {
                $order = $order->findOrderBydate($_GET['date_from'], $_GET['date_to']);
            }

            $sortBy = ['id'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $order = $order->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            

            if (\Request::route()->getName() == 'order.index') {
                $order = $order->getCustomerOrders(Auth::id());
            }

            if(isset($_GET['delivery_boy_id'])){
                $order = $order->where('delivery_boy_id',$_GET['delivery_boy_id']);
                return $this->successResponse(OrderResource::collection($order->get()), 'Data Get Successfully!');
            }
            return $this->successResponse(OrderResource::collection($order->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($order)
    {
        $order = Order::where('id',$order->id);
        if (isset($_GET['orderDetail']) && $_GET['orderDetail'] == '1') {
            $order = $order->with('detail');
            $order = $order->with('detail.product_combination');
        }
        $languageId = Language::defaultLanguage()->value('id');
            if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                $language = Language::languageId($_GET['language_id'])->firstOrFail();
                $languageId = $language->id;
            }
            if (isset($_GET['productDetail']) && $_GET['productDetail'] == '1') {
                $order = $order->getProductDetailByLanguageId($languageId);
            }
        if (isset($_GET['customer']) && $_GET['customer'] == '1') {
            $order = $order->with('customer');
        }
        if (isset($_GET['currency']) && $_GET['currency'] == '1') {
            $order = $order->with('currency');
        }
        if (isset($_GET['billing_country']) && $_GET['billing_country'] == '1') {
            $order = $order->with('billing_country1');
        }
        if (isset($_GET['billing_state']) && $_GET['billing_state'] == '1') {
            $order = $order->with('billing_state1');
        }
        if (isset($_GET['delivery_country']) && $_GET['delivery_country'] == '1') {
            $order = $order->with('delivery_country1');
        }
        if (isset($_GET['delivery_state']) && $_GET['delivery_state'] == '1') {
            $order = $order->with('delivery_state1');
        }
        try {
            return $this->successResponse(new OrderResource($order->firstOrFail()), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $order)
    {
        try {
            $order->update($parms);
            if($parms['order_status'] == 'Return' || $parms['order_status'] == 'Cancel'){
                $orderService = new OrderService;
                $orderService = $orderService->revertOrderProductsQuantity($order);
            }
            OrderHistory::create([
                'order_id'=>$order->id,
                'order_status' => $parms['order_status']
            ]);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($order) {
            // if ($parms['order_status'] == 'Return') {
            //     $default_account = DefaultAccount::pluck('account_id', 'type')->toArray();
            //     $account_id = Account::where('type', 'customer')->where('reference_id', $order->customer_id)->value('id');
            //     if (!$account_id) {
            //         $account_id = $default_account['customer'];
            //     }
            //     $inc = Transaction::latest()->value('transaction_number');
            //     $inc = intVal($inc);
            //     $inc++;
            //     $trans_id = Transaction::create([
            //         'transaction_number' => $inc,
            //         'transaction_date' => date('Y-m-d'),
            //         'description' => 'order sale return item'
            //     ]);
            //     TransactionDetail::create([
            //         'transaction_id' => $trans_id->id,
            //         'account_id' => $default_account['cash'],
            //         'reference_id' => $order->id,
            //         'user_id' => $order->customer_id,
            //         'type' => 'cash',
            //         'dr_amount' => '0',
            //         'cr_amount' => $order->order_price
            //     ]);

            //     TransactionDetail::create([
            //         'transaction_id' => $trans_id->id,
            //         'account_id' => $default_account['tax'],
            //         'reference_id' => $order->id,
            //         'user_id' => $order->customer_id,
            //         'type' => 'sale',
            //         'dr_amount' => $order->total_tax,
            //         'cr_amount' => '0'
            //     ]);
            //     TransactionDetail::create([
            //         'transaction_id' => $trans_id->id,
            //         'account_id' => $default_account['couponcode'],
            //         'reference_id' => $order->id,
            //         'user_id' => $order->customer_id,
            //         'type' => 'sale',
            //         'dr_amount' => $order->coupon_amount,
            //         'cr_amount' => '0'
            //     ]);
            //     TransactionDetail::create([
            //         'transaction_id' => $trans_id->id,
            //         'account_id' => $default_account['shipping'],
            //         'reference_id' => $order->id,
            //         'user_id' => $order->customer_id,
            //         'type' => 'sale',
            //         'dr_amount' => $order->shipping_cost,
            //         'cr_amount' => '0'
            //     ]);

            //     $remaining = intVal($order->order_price) - intVal($order->total_tax) - intVal($order->coupon_amount) - intVal($order->shipping_cost);

            //     TransactionDetail::create([
            //         'transaction_id' => $trans_id->id,
            //         'account_id' => $default_account['sale'],
            //         'reference_id' => $order->id,
            //         'user_id' => $order->customer_id,
            //         'type' => 'sale',
            //         'dr_amount' => $remaining,
            //         'cr_amount' => '0'
            //     ]);
            // } else if ($parms['order_status'] == 'Complete') {
            //     $accountTransaction = new OrderService;
            //     $accountTransaction = $accountTransaction->CompleteTransaction($order,$order->customer_id);
            // }

            return $this->successResponse(new OrderResource($order), 'Order Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function addOrderNotes(array $parms)
    {
        $data = array('order_id'=>1,'notes'=>$parms['notes'],'title'=>$parms['title']);
        try {
            $orderNotes = OrderNote::create($data);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($orderNotes) {
            // return $orderNotes;  
            return $this->successResponseArray([$orderNotes], 'Order Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function addOrderComments(array $parms){
        $data = array('order_id'=>1,'message'=>$parms['message'],'user_id' => \Auth::id());
        try {
            $orderComments = OrderComment::create($data);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($orderComments) {
            // return $orderNotes;  
            return $this->successResponseArray([$orderComments], 'Order Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

   
}
