<?php

namespace App\Repository\Admin;

use App\Contract\Admin\SliderTypeInterface;
use App\Http\Resources\Admin\SliderType as SliderTypeResource;
use App\Models\Admin\SliderType;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class SliderTypeRepository implements SliderTypeInterface
{
    use ApiResponser;
    public function all()
    {
        try {
            $sliderType = new SliderType;
            if (isset($_GET['getSlider']) && $_GET['getSlider'] == '1') {
                $sliderType = $sliderType->with('slider');
            }
            if (isset($_GET['getLanguage']) && $_GET['getLanguage'] == '1') {
                $sliderType = $sliderType->with('slider.language');
            }
            if (isset($_GET['getSliderType']) && $_GET['getSliderType'] == '1') {
                $sliderType = $sliderType->with('slider.slider_type');
            }
            if (isset($_GET['getSliderNavigation']) && $_GET['getSliderNavigation'] == '1') {
                $sliderType = $sliderType->with('slider.slider_navigation');
            }
            if (isset($_GET['getCategory']) && $_GET['getCategory'] == '1') {
                $sliderType = $sliderType->with('slider.category');
            }
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $sliderType = $sliderType->with('slider.slider_detail');
            }
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            
            return $this->successResponse(SliderTypeResource::collection($sliderType->paginate($numOfResult)) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($sliderType)
    {
        try {
            $sliderType = SliderType::sliderTypeId($sliderType->id);
            if (isset($_GET['getSlider']) && $_GET['getSlider'] == '1') {
                $sliderType = $sliderType->with('slider');
            }
            if (isset($_GET['getLanguage']) && $_GET['getLanguage'] == '1') {
                $sliderType = $sliderType->with('slider.language');
            }
            if (isset($_GET['getSliderType']) && $_GET['getSliderType'] == '1') {
                $sliderType = $sliderType->with('slider.slider_type');
            }
            if (isset($_GET['getSliderNavigation']) && $_GET['getSliderNavigation'] == '1') {
                $sliderType = $sliderType->with('slider.slider_navigation');
            }
            if (isset($_GET['getCategory']) && $_GET['getCategory'] == '1') {
                $sliderType = $sliderType->with('slider.category');
            }
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $sliderType = $sliderType->with('slider.slider_detail');
            }
            
            return $this->successResponse(new SliderTypeResource($sliderType->firstOrFail()) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse('Something went wrong, please try again!', 422);
        }
    }

}
