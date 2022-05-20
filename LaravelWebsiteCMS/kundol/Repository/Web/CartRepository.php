<?php

namespace App\Repository\Web;

use App\Contract\Web\CartInterface;
use App\Http\Resources\Web\Cart as CartResource;
use App\Models\Web\Cart;
use App\Models\Admin\Language;
use App\Services\Admin\AvailableQty;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Gate;
use Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class CartRepository implements CartInterface
{
    use ApiResponser;
    public function all($params)
    {
        // return $params['session_id'];

        $sql = Cart::type()->where('is_order', '0');
        if (Auth::check()) {
            $sql = $sql->customerId(Auth::id());
        }
        if (isset($params['session_id']) && $params['session_id'] != '') {
            $sql = $sql->where('session_id', $params['session_id']);
        } else {
            if (!Auth::check())
                return $this->errorResponse('cart is empty please check if you have sent the session_id or you are logged in');
        }
        try {
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            $languageId = Language::defaultLanguage()->value('id');
            if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                $language = Language::languageId($_GET['language_id'])->firstOrFail();
                $languageId = $language->id;
            }
            $sql = $sql->getProductDetailByLanguageId($languageId);
            $sql = $sql->getProductVariationByLanguageId($languageId);
            $sql = $sql->productCategoryDetail($languageId)->availableQtys();
            $sql = $sql->paginate($numOfResult);
            $sql = $sql->unique();
            return $this->successResponse(CartResource::collection($sql), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($Cart)
    {
        try {
            return $this->successResponse(new CartResource(Cart::CartId($Cart->id)->where('is_order', '0')->firstOrFail()), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            if (Auth::check()) {
                $customer_id = Auth::id();
                $session_id = '';
                if (isset($parms['session_id']) && $parms['session_id'] != '') {
                    Cart::where('session_id', $parms['session_id'])->update(['customer_id' => $customer_id, 'session_id' => '']);
                }
            } else {
                $customer_id = 0;
                if (isset($parms['session_id']) && $parms['session_id'] != '')
                    $session_id = $parms['session_id'];
                else
                    $session_id = Hash::make(time());
            }

            if (!Gate::allows('isDigital')) {
                if (!isset($parms['product_combination_id']))
                $parms['product_combination_id'] = null;
                $parms['session_id'] = $session_id;
                $qtyValidation = new AvailableQty;
                $qtyValidation = $qtyValidation->availableQty($parms['product_id'], $parms['product_combination_id'], $parms['qty'],'cart');
                if (!$qtyValidation) {
                    return $this->errorResponse('Out of Stock!', 422);
                }
            } else {
                $parms['qty'] = null;
                $parms['product_combination_id'] = null;
            }

            if(isset($parms['customer_id'])){
                $customer_id = $parms['customer_id'];
                $session_id = '';
            }

            $sql = Cart::updateOrCreate(
                ['product_id' => $parms['product_id'], 'product_combination_id' => $parms['product_combination_id'], 'is_order' => '0', 'customer_id' => $customer_id, 'session_id' => $session_id],
                $parms
            );
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse(new CartResource($sql), 'Cart Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($parms)
    {
        try {
            if (Auth::check()) {
                $customer_id = Auth::id();
                $session_id = '';
            } else {
                $customer_id = 0;
                if (isset($parms['session_id']) && $parms['session_id'] != '')
                    $session_id = $parms['session_id'];
                else
                    return $this->errorResponse('Session ID is Required');
            }
            
            if (!isset($parms['product_combination_id']))
            $parms['product_combination_id'] = null;
            if(isset($parms['product_id'])){
                $sql = Cart::where('product_id', $parms['product_id'])->where('product_combination_id', $parms['product_combination_id'])->where('customer_id', $customer_id)->where('session_id', $session_id)->delete();
            }
            else{
                $sql = Cart::where('customer_id', $customer_id)->where('session_id', $session_id)->delete();
            }
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse('', 'Cart Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
