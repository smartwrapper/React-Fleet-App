<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\CustomerInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Admin\Customer;
use App\Repository\Admin\CustomerRepository;

class CustomerController extends Controller
{
    private $CustomerRepository;

    public function __construct(CustomerInterface $CustomerRepository)
    {
        $this->CustomerRepository = $CustomerRepository;
    }

    public function index()
    {
        return $this->CustomerRepository->all();
    }

    public function show(Customer $Customer)
    {
        return $this->CustomerRepository->show($Customer);
    }

    public function store(CustomerRequest $request)
    {
        $parms = $request->all();
        return $this->CustomerRepository->store($parms);
    }

    public function update(CustomerRequest $request, Customer $Customer)
    {
        $parms = $request->all();
        return $this->CustomerRepository->update($parms, $Customer);
    }

    public function destroy($id)
    {
        return $this->CustomerRepository->destroy($id);
    }

}
