<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\TaxInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\TaxRequest;
use App\Models\Admin\Tax;
use App\Repository\Admin\TaxRepository;

class TaxController extends Controller
{
    private $TaxRepository;

    public function __construct(TaxInterface $TaxRepository)
    {
        $this->TaxRepository = $TaxRepository;
    }

    public function index()
    {
        return $this->TaxRepository->all();
    }

    public function show(Tax $tax)
    {
        return $this->TaxRepository->show($tax);
    }

    public function store(TaxRequest $request)
    {
        $parms = $request->all();
        return $this->TaxRepository->store($parms);
    }

    public function update(TaxRequest $request, Tax $tax)
    {
        $parms = $request->all();
        return $this->TaxRepository->update($parms, $tax);
    }

    public function destroy($id)
    {
        return $this->TaxRepository->destroy($id);
    }

}
