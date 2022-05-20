<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\TaxRateInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\TaxRateRequest;
use App\Models\Admin\TaxRate;
use App\Repository\Admin\TaxRateRepository;
use Illuminate\Http\Request;

class TaxRateController extends Controller
{

    private $TaxRateRepository;

    public function __construct(TaxRateInterface $TaxRateRepository)
    {
        $this->TaxRateRepository = $TaxRateRepository;
    }

    public function index()
    {
        return $this->TaxRateRepository->all();
    }

    public function show(TaxRate $taxRate)
    {
        return $this->TaxRateRepository->show($taxRate);
    }

    public function store(TaxRateRequest $request)
    {
        return $this->TaxRateRepository->store($request->all());
    }

    public function update(TaxRateRequest $request, TaxRate $taxRate)
    {
        return $this->TaxRateRepository->update($request->all(), $taxRate);
    }

    public function destroy($id)
    {
        return $this->TaxRateRepository->destroy($id);
    }

    public function findByState(Request $request)
    {
        return $this->TaxRateRepository->findByState($request->state_id);
    }

}
