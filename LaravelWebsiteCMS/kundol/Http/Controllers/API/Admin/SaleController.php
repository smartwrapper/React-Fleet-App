<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\SaleInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\SaleRequest;
use App\Models\Admin\Sale;
use App\Repository\Admin\SaleRepository;
use App\Services\Admin\SaleService;

class SaleController extends Controller
{
    private $SaleRepository;

    public function __construct(SaleInterface $SaleRepository)
    {
        $this->SaleRepository = $SaleRepository;
    }

    public function index()
    {
        return $this->SaleRepository->all();
    }

    public function show(Sale $sale)
    {
        return $this->SaleRepository->show($sale);
    }

    public function store(SaleRequest $request)
    {
        $parms = $request->all();
        $validated = new SaleService;
        $validated = $validated->saleDetailValidate($request);
        if ($validated != '1') {
            return $validated;
        }
        return $this->SaleRepository->store($parms);
    }

    public function destroy($id)
    {
        return $this->SaleRepository->destroy($id);
    }

}
