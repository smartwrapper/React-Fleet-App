<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\PurchaseInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\PurchaseRequest;
use App\Models\Admin\Purchase;
use App\Repository\Admin\PurchaseRepository;
use App\Services\Admin\PurchaseDetailService;

class PurchaseController extends Controller
{
    private $PurchaseRepository;

    public function __construct(PurchaseInterface $PurchaseRepository)
    {
        $this->PurchaseRepository = $PurchaseRepository;
    }

    public function index()
    {
        return $this->PurchaseRepository->all();
    }

    public function show(Purchase $purchase)
    {
        return $this->PurchaseRepository->show($purchase);
    }

    public function store(PurchaseRequest $request)
    {
        $parms = $request->all();
        $validated = new PurchaseDetailService;
        $validated = $validated->purchaseDetailValidate($request);
        if ($validated != '1') {
            return $validated;
        }
        return $this->PurchaseRepository->store($parms);
    }

    public function destroy($id)
    {
        return $this->PurchaseRepository->destroy($id);
    }

}
