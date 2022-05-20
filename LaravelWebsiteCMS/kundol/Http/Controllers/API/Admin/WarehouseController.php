<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\WarehouseInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\WarehouseRequest;
use App\Models\Admin\Warehouse;
use App\Repository\Admin\WarehouseRepository;

class WarehouseController extends Controller
{
    private $WarehouseRepository;

    public function __construct(WarehouseInterface $WarehouseRepository)
    {
        $this->WarehouseRepository = $WarehouseRepository;
    }

    public function index()
    {
        return $this->WarehouseRepository->all();
    }

    public function show(Warehouse $warehouse)
    {
        return $this->WarehouseRepository->show($warehouse);
    }

    public function store(WarehouseRequest $request)
    {
        $parms = $request->all();
        return $this->WarehouseRepository->store($parms);
    }

    public function update(WarehouseRequest $request, Warehouse $warehouse)
    {
        $parms = $request->all();
        return $this->WarehouseRepository->update($parms, $warehouse);
    }

    public function destroy($id)
    {
        return $this->WarehouseRepository->destroy($id);
    }

}
