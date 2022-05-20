<?php

namespace App\Http\Controllers\API\Web;

use App\Contract\Web\CustomerAddressBookInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\CustomerAddressBookRequest;
use App\Models\Web\CustomerAddressBook;
use App\Repository\Web\CustomerAddressBookRepository;

class CustomerAddressBookController extends Controller
{
    private $customerAddressBookRepository;

    public function __construct(CustomerAddressBookInterface $customerAddressBookRepository)
    {
        $this->customerAddressBookRepository = $customerAddressBookRepository;
    }

    public function index()
    {
        return $this->customerAddressBookRepository->all();
    }

    public function show(CustomerAddressBook $customerAddressBook)
    {
        return $this->customerAddressBookRepository->show($customerAddressBook);
    }

    public function store(CustomerAddressBookRequest $request)
    {
        $parms = $request->all();
        return $this->customerAddressBookRepository->store($parms);
    }

    public function update(CustomerAddressBookRequest $request, CustomerAddressBook $customerAddressBook)
    {
        $parms = $request->all();
        return $this->customerAddressBookRepository->update($parms, $customerAddressBook);
    }

    public function destroy(CustomerAddressBook $customerAddressBook)
    {
        return $this->customerAddressBookRepository->destroy($customerAddressBook);
    }
}
