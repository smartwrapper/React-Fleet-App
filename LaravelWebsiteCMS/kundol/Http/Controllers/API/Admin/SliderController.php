<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\SliderInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Admin\Slider;
use App\Repository\Admin\SliderRepository;

class SliderController extends Controller
{
    private $SliderRepository;

    public function __construct(SliderInterface $SliderRepository)
    {
        $this->SliderRepository = $SliderRepository;
    }

    public function index()
    {
        return $this->SliderRepository->all();
    }

    public function show(Slider $slider)
    {
        return $this->SliderRepository->show($slider);
    }

    public function store(SliderRequest $request)
    {
        $parms = $request->all();
        return $this->SliderRepository->store($parms);
    }

    public function update(SliderRequest $request, Slider $slider)
    {
        $parms = $request->all();
        return $this->SliderRepository->update($parms, $slider);
    }

    public function destroy($id)
    {
        return $this->SliderRepository->destroy($id);
    }

}
