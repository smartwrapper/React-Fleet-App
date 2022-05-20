<?php

namespace App\Repository\Admin;

use App\Contract\Admin\SliderNavigationInterface;
use App\Http\Resources\Admin\SliderNavigation as SliderNavigationResource;
use App\Models\Admin\SliderNavigation;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class SliderNavigationRepository implements SliderNavigationInterface
{
    use ApiResponser;
    public function all()
    {
        try {
            $sliderNavigation = new SliderNavigation;
            if (isset($_GET['getSlider']) && $_GET['getSlider'] == '1') {
                $sliderNavigation = $sliderNavigation->with('slider');
            }
            if (isset($_GET['getLanguage']) && $_GET['getLanguage'] == '1') {
                $sliderNavigation = $sliderNavigation->with('slider.language');
            }
            if (isset($_GET['getSliderNavigation']) && $_GET['getSliderNavigation'] == '1') {
                $sliderNavigation = $sliderNavigation->with('slider.slider_type');
            }
            if (isset($_GET['getSliderNavigation']) && $_GET['getSliderNavigation'] == '1') {
                $sliderNavigation = $sliderNavigation->with('slider.slider_navigation');
            }
            if (isset($_GET['getCategory']) && $_GET['getCategory'] == '1') {
                $sliderNavigation = $sliderNavigation->with('slider.category');
            }
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $sliderNavigation = $sliderNavigation->with('slider.slider_detail');
            }
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            return $this->successResponse(SliderNavigationResource::collection($sliderNavigation->paginate($numOfResult)) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($sliderNavigation)
    {
        try {
            $sliderNavigation = SliderNavigation::sliderNavigationId($sliderNavigation->id);
            if (isset($_GET['getSlider']) && $_GET['getSlider'] == '1') {
                $sliderNavigation = $sliderNavigation->with('slider');
            }
            if (isset($_GET['getLanguage']) && $_GET['getLanguage'] == '1') {
                $sliderNavigation = $sliderNavigation->with('slider.language');
            }
            if (isset($_GET['getSliderNavigation']) && $_GET['getSliderNavigation'] == '1') {
                $sliderNavigation = $sliderNavigation->with('slider.slider_type');
            }
            if (isset($_GET['getSliderNavigation']) && $_GET['getSliderNavigation'] == '1') {
                $sliderNavigation = $sliderNavigation->with('slider.slider_navigation');
            }
            if (isset($_GET['getCategory']) && $_GET['getCategory'] == '1') {
                $sliderNavigation = $sliderNavigation->with('slider.category');
            }
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $sliderNavigation = $sliderNavigation->with('slider.slider_detail');
            }
            
            return $this->successResponse(new SliderNavigationResource($sliderNavigation->firstOrFail()) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse('Something went wrong, please try again!', 422);
        }
    }

}
