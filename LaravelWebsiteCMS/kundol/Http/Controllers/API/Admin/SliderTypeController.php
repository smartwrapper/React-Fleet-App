<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\SliderTypeInterface;
use App\Http\Controllers\Controller as Controller;
use App\Repository\Admin\SliderTypeRepository;
use App\Models\Admin\SliderType;

class SliderTypeController extends Controller
{
    private $sliderTypeRepository;

    public function __construct(SliderTypeInterface $sliderTypeRepository)
    {
        $this->sliderTypeRepository = $sliderTypeRepository;
    }

    public function index()
    {
        return $this->sliderTypeRepository->all();
    }

    public function show(SliderType $sliderType)
    {
        return $this->sliderTypeRepository->show($sliderType);
    }

}
