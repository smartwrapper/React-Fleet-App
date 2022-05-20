<?php

namespace App\Repository\Web;

use App\Contract\Web\CustomerAddressBookInterface;
use App\Http\Resources\Web\CustomerAddressBook as CustomerAddressBookResource;
use App\Models\Web\CustomerAddressBook;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class CustomerAddressBookRepository implements CustomerAddressBookInterface
{
    use ApiResponser;
    /**
     * @return Collection
     */
    public function all()
    {
        try {
            $customerAddressBook = new CustomerAddressBook;
            $customerAddressBook = $customerAddressBook->with('customer');
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            if (isset($_GET['is_default']) && $_GET['is_default'] != '') {
                $customerAddressBook = $customerAddressBook->where('is_default', '1');
            }

            $sortBy = ['gender', 'company', 'street_address', 'suburb', 'postcode', 'dob', 'city', 'country_id', 'state_id', 'lattitude', 'longitude'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $customerAddressBook = $customerAddressBook->orderBy($_GET['sortBy'], $_GET['sortType']);
            }
            return $this->successResponse(CustomerAddressBookResource::collection($customerAddressBook->getCustomerAddress(\Auth::id())->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($customerAddressBook)
    {

        try {
            return $this->successResponse(new CustomerAddressBookResource($customerAddressBook), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            if(isset($parms['is_default']) && $parms['is_default'] == '1'){
                CustomerAddressBook::getCustomerAddress(\Auth::id())->update([
                    'is_default' => 0
                ]);
            }
            if(!isset($parms['customer_id']))
                $parms['customer_id'] = \Auth::id();
                
            $sql =  new CustomerAddressBook;
            $sql = $sql->create($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new CustomerAddressBookResource($sql), 'Customer Address Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $customerAddressBook)
    {
        try {
            if(isset($parms['is_default']) && $parms['is_default'] == '1'){
                CustomerAddressBook::getCustomerAddress(\Auth::id())->where('id', '!=', $customerAddressBook->id)->update([
                    'is_default' => 0
                ]);
            }
            $customerAddressBook->update($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($customerAddressBook) {
            return $this->successResponse(new CustomerAddressBookResource($customerAddressBook), 'Customer Address Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($customerAddressBook)
    {
        try {
            if($customerAddressBook->is_default == '1'){
                return $this->errorResponse('listing not delete due to default setting!');
            }
            $customerAddressBook->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($customerAddressBook) {
            return $this->successResponse('', 'Customer Address Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
