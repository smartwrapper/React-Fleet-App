<?php

namespace App\Repository\Admin;

use App\Contract\Admin\CustomerInterface;
use App\Http\Resources\Admin\Customer as CustomerResource;
use App\Models\Admin\Customer;
use App\Services\Admin\AccountService;
use App\Services\Admin\PointService;
use App\Traits\ApiResponser;
use DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Auth;

class CustomerRepository implements CustomerInterface
{
    use ApiResponser;
 
    public function all()
    {
        try {
            $customer = new Customer;
            if (isset($_GET['getGallary']) && $_GET['getGallary'] == '1') {
                $customer = $customer::with('gallary');
            }

            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $customer = $customer->searchParameter($_GET['searchParameter']);
            }

            $sortBy = ['id', 'first_name', 'last_name', 'email'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $customer = $customer->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            return $this->successResponse(CustomerResource::collection($customer->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($customer)
    {
        try {
            if (isset($_GET['getGallary']) && $_GET['getGallary'] == '1') {
                return $this->successResponse(new CustomerResource(Customer::with('gallary')->customerId($customer->id)->firstOrFail()), 'Data Get Successfully!');
            }
            return $this->successResponse(new CustomerResource($customer), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $sql = new Customer;
            $parms['password'] = Hash::make($parms['password']);
            $parms['hash'] = str_replace("/",'1',Hash::make('time'));
            if (Auth::check())
                $parms['created_by'] = \Auth::id();
            $sql = $sql->create($parms);

            $points = new PointService;
            $points->customerPoints($parms, $sql->id);
            
            $accounts = new AccountService;
            $accounts->createAccount('CUSTOMER', $parms['first_name'], $sql->id);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new CustomerResource($sql), 'Customer Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $customer)
    {
        DB::beginTransaction();
        try {
            if (Auth::check())
                $parms['updated_by'] = \Auth::id();
            if(isset($parms['password']))
                $parms['password'] = Hash::make($parms['password']);
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

    public function destroy($customer)
    {
        try {
            $sql = Customer::findOrFail($customer);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse('', 'Customer Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
