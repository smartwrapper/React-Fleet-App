<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\QuotationInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\QuotationRequest;
use App\Models\Admin\Quotation;
use App\Repository\Admin\QuotationRepository;

class QuotationController extends Controller
{
    private $quotationRepository;

    public function __construct(QuotationInterface $quotationRepository)
    {
        $this->quotationRepository = $quotationRepository;
    }

    public function index()
    {
        return $this->quotationRepository->all();
    }

    public function show(Quotation $Quotation)
    {
        return $this->quotationRepository->show($Quotation);
    }

    public function store(QuotationRequest $request)
    {
        $parms = $request->all();
        return $this->quotationRepository->store($parms);
    }

    public function update(QuotationRequest $request, Quotation $Quotation)
    {
        $parms = $request->all();
        return $this->quotationRepository->update($parms, $Quotation);
    }

    public function destroy($id)
    {
        return $this->quotationRepository->destroy($id);
    }

}
