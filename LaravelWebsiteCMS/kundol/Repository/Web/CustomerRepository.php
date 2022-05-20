<?php

namespace App\Repository\Web;

use App\Contract\Web\CustomerInterface;
use App\Http\Resources\Web\Customer as CustomerResource;
use App\Models\Admin\Customer;
use App\Traits\ApiResponser;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;

class CustomerRepository implements CustomerInterface
{
    use ApiResponser;

    public function show($customer)
    {
        try {
            return $this->successResponse(new CustomerResource($customer), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $customer)
    {
        DB::beginTransaction();
        try {
            if(!isset($parms['type'])){
                if (Auth::check())
                    $parms['updated_by'] = \Auth::id();
                $parms['password'] = Hash::make($parms['password']);
            }
            $sql = $customer->update($parms);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse();
        }

        if ($sql) {
            DB::commit();
            return $this->successResponse(new CustomerResource($customer), 'Customer Update Successfully!');
        } else {
            DB::rollback();
            return $this->errorResponse();
        }
    }
}
