<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\SliderNavigationInterface;
use App\Http\Controllers\Controller as Controller;
use App\Models\Admin\SliderNavigation;
use App\Repository\Admin\SliderNavigationRepository;

class SliderNavigationController extends Controller
{
    private $SliderNavigationRepository;

    public function __construct(SliderNavigationInterface $SliderNavigationRepository)
    {
        $this->SliderNavigationRepository = $SliderNavigationRepository;
    }

    public function index()
    {
        return $this->SliderNavigationRepository->all();
    }

    public function show(SliderNavigation $sliderNavigation)
    {
        return $this->SliderNavigationRepository->show($sliderNavigation);
    }

}
