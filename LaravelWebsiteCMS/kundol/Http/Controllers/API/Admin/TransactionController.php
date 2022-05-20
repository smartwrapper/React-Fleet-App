<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\TransactionInterface;
use App\Http\Controllers\Controller as Controller;
use App\Models\Admin\Transaction;
use App\Http\Requests\TransactionRequest;


class TransactionController extends Controller
{
    private $transactionRepository;

    public function __construct(TransactionInterface $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function index()
    {
        return $this->transactionRepository->all();
    }


    public function store(TransactionRequest $request)
    {
        $parms = $request->all();
        return $this->transactionRepository->store($parms);
    }
}
