<?php

namespace App\Http\Controllers\API\Web;

use App\Http\Controllers\Controller as Controller;
use App\Models\Admin\CustomerOrderAmount;
use App\Models\Admin\Membership;
use Auth;
use App\Traits\ApiResponser;

class MembershipLevelController extends Controller
{
    use ApiResponser;

    public function index()
    {
        $customer = CustomerOrderAmount::where('customer_id', Auth::id())->first();
        if (!$customer) {
            return $this->errorResponseArray('Customer have no order!');
        }
        $membership = Membership::select('start_value', 'end_value', 'display_text')->whereRaw('? between start_value and end_value', [$customer->order_amount])->first();
        if (!$membership) {
            return $this->errorResponseArray('Membership level not found!');
        }
        return $this->successResponseArray($membership, 'Data Get Successfully!');
    }
}
