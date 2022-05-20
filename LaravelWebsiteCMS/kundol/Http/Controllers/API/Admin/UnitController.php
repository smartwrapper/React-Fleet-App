<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\UnitInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\UnitRequest;
use App\Models\Admin\Unit;
use App\Repository\Admin\UnitRepository;
use App\Traits\ApiResponser;

class UnitController extends Controller
{
    use ApiResponser;
    private $UnitRepository;

    public function __construct(UnitInterface $UnitRepository)
    {
        $this->UnitRepository = $UnitRepository;
    }

    public function index()
    {
        return $this->UnitRepository->all();
    }

    public function show(Unit $unit)
    {
        return $this->UnitRepository->show($unit);
    }

    public function store(UnitRequest $request)
    {
        $parms = $request->all();
        return $this->UnitRepository->store($parms);
    }

    public function update(UnitRequest $request, Unit $unit)
    {
        $parms = $request->all();

        return $this->UnitRepository->update($parms, $unit);

    }

    public function destroy($id)
    {
        return $this->UnitRepository->destroy($id);
    }

}
