<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\AttributeInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\AttributeRequest;
use App\Models\Admin\Attribute;
use App\Repository\Admin\AttributeRepository;

class AttributeController extends Controller
{
    private $AttributeRepository;

    public function __construct(AttributeInterface $AttributeRepository)
    {
        $this->AttributeRepository = $AttributeRepository;
    }

    public function index()
    {
        return $this->AttributeRepository->all();
    }

    public function show(Attribute $attribute)
    {
        return $this->AttributeRepository->show($attribute);
    }

    public function store(AttributeRequest $request)
    {
        $parms = $request->all();
        return $this->AttributeRepository->store($parms);
    }

    public function update(AttributeRequest $request, Attribute $attribute)
    {
        $parms = $request->all();
        return $this->AttributeRepository->update($parms, $attribute);
    }

    public function destroy($id)
    {
        return $this->AttributeRepository->destroy($id);
    }

}
