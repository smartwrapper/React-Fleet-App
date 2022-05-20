<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\PurchaserInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\PurchaserRequest;
use App\Models\Admin\Purchaser;
use App\Repository\Admin\PurchaserRepository;

class PurchaserController extends Controller
{
    private $PurchaserRepository;

    public function __construct(PurchaserInterface $PurchaserRepository)
    {
        $this->PurchaserRepository = $PurchaserRepository;
    }

    public function index()
    {
        return $this->PurchaserRepository->all();
    }

    public function show(Purchaser $purchaser)
    {
        return $this->PurchaserRepository->show($purchaser);
    }

    public function store(PurchaserRequest $request)
    {
        $parms = $request->all();
        return $this->PurchaserRepository->store($parms);
    }

    public function update(PurchaserRequest $request, Purchaser $purchaser)
    {
        $parms = $request->all();
        return $this->PurchaserRepository->update($parms, $purchaser);
    }

    public function destroy($id)
    {
        return $this->PurchaserRepository->destroy($id);
    }

}
