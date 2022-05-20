<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\AccountInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\AccountRequest;
use App\Models\Admin\Account;
use App\Repository\Admin\AccountRepository;

class AccountController extends Controller
{
    private $AccountRepository;

    public function __construct(AccountInterface $AccountRepository)
    {
        $this->AccountRepository = $AccountRepository;
    }

    public function index()
    {
        return $this->AccountRepository->all();
    }

    public function show(Account $account)
    {
        return $this->AccountRepository->show($account);
    }

    public function store(AccountRequest $request)
    {
        $parms = $request->all();
        return $this->AccountRepository->store($parms);
    }

    public function update(AccountRequest $request, Account $account)
    {
        $parms = $request->all();
        return $this->AccountRepository->update($parms, $account);
    }

    public function destroy($id)
    {
        return $this->AccountRepository->destroy($id);
    }

}
