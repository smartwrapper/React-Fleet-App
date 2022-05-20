<?php

namespace App\Http\Controllers\API\Web;

use App\Contract\Web\CustomerInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\Admin\Customer;
use App\Repository\Web\CustomerRepository;

class CustomerController extends Controller
{
    private $customerRepository;

    public function __construct(CustomerInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function show(Customer $customer)
    {
        return $this->customerRepository->show($customer);
    }

    public function update(CustomerUpdateRequest $request, Customer $customer)
    {
        $parms = $request->all();
        return $this->customerRepository->update($parms, $customer);
    }

}
