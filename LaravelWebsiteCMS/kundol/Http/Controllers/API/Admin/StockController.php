<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\StockInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\StockRequest;
use App\Models\Admin\Inventory;

class StockController extends Controller
{
    private $StockRepository;

    public function __construct(StockInterface $StockRepository)
    {
        $this->StockRepository = $StockRepository;
    }

    public function index()
    {
        return $this->StockRepository->all();
    }

    public function show(Inventory $stock)
    {
        return $this->StockRepository->show($stock);
    }

    public function store(StockRequest $request)
    {
        $parms = $request->all();
        return $this->StockRepository->store($parms);
    }
}
