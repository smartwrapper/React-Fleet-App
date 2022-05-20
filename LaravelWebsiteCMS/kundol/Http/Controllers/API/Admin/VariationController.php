<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\VariationInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\VariationRequest;
use App\Models\Admin\Variation;
use App\Repository\Admin\VariationRepository;

class VariationController extends Controller
{

    private $VariationRepository;

    public function __construct(VariationInterface $VariationRepository)
    {
        $this->VariationRepository = $VariationRepository;
    }

    public function index()
    {
        return $this->VariationRepository->all();
    }

    public function show(Variation $variation)
    {
        return $this->VariationRepository->show($variation);
    }

    public function store(VariationRequest $request)
    {
        return $this->VariationRepository->store($request->all());
    }

    public function update(VariationRequest $request, Variation $variation)
    {
        return $this->VariationRepository->update($request->all(), $variation);
    }

    public function destroy($id)
    {
        return $this->VariationRepository->destroy($id);
    }

}
