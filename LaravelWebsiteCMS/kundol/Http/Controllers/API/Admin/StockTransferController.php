<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\StockTransferInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\StockTransferRequest;
use App\Models\Admin\StockTransfer;
use App\Repository\Admin\StockTransferRepository;
use App\Services\Admin\StockTransferService;
use App\Traits\ApiResponser;

class StockTransferController extends Controller
{
    private $stockTransferRepository;
    use ApiResponser;

    public function __construct(StockTransferInterface $stockTransferRepository)
    {
        $this->stockTransferRepository = $stockTransferRepository;
    }

    public function index()
    {
        return $this->stockTransferRepository->all();
    }

    public function show(StockTransfer $stockTransfer)
    {
        return $this->stockTransferRepository->show($stockTransfer);
    }

    public function store(StockTransferRequest $request)
    {
        $parms = $request->all();
        $stockTransferService = new StockTransferService;
        $sql = $stockTransferService->StockTransferValidate($parms);

        if (!$sql) {
            return $this->errorResponse('Product out of stock!', 422);
        }
        return $this->stockTransferRepository->store($parms);
    }

    public function destroy($id)
    {
        return $this->stockTransferRepository->destroy($id);
    }

}
