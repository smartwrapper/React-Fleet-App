<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\DefaultAccountInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\DefaultAccountRequest;
use App\Models\Admin\DefaultAccount;
use App\Repository\Admin\DefaultAccountRepository;

class DefaultAccountController extends Controller
{
    private $DefaultAccountRepository;

    public function __construct(DefaultAccountInterface $DefaultAccountRepository)
    {
        $this->DefaultAccountRepository = $DefaultAccountRepository;
    }

    public function index()
    {
        return $this->DefaultAccountRepository->all();
    }

    public function show(DefaultAccount $defaultAccount)
    {
        return $this->DefaultAccountRepository->show($defaultAccount);
    }

    public function store(DefaultAccountRequest $request)
    {
        $parms = $request->all();
        return $this->DefaultAccountRepository->store($parms);
    }

    public function update(DefaultAccountRequest $request, DefaultAccount $defaultAccount)
    {
        $parms = $request->all();
        return $this->DefaultAccountRepository->update($parms, $defaultAccount);
    }

    public function destroy($id)
    {
        return $this->DefaultAccountRepository->destroy($id);
    }

}
