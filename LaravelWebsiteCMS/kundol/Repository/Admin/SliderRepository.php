<?php

namespace App\Repository\Admin;

use App\Contract\Admin\SliderInterface;
use App\Http\Resources\Admin\Slider as SliderResource;
use App\Models\Admin\Slider;
use App\Models\Admin\Language;

use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class SliderRepository implements SliderInterface
{
    use ApiResponser;
    public function all()
    {
        try {
            $slider = new Slider;
            if (isset($_GET['getLanguage']) && $_GET['getLanguage'] == '1') {
                $slider = $slider->with('language');
            }
            if (isset($_GET['getSliderType']) && $_GET['getSliderType'] == '1') {
                $slider = $slider->with('slider_type');
            }
            if (isset($_GET['getSliderNavigation']) && $_GET['getSliderNavigation'] == '1') {
                $slider = $slider->with('slider_navigation');
            }
            if (isset($_GET['getSliderGallary']) && $_GET['getSliderGallary'] == '1') {
                $slider = $slider->with('gallary')->with('gallary.detail');
            }
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            if (isset($_GET['sliderType']) && $_GET['sliderType'] != null) {
                $slider = $slider->SliderTypeSearch($_GET['sliderType']);
            }

            $languageId = Language::defaultLanguage()->value('id');
            if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                $languageId = Language::languageId($_GET['language_id'])->value('id');
            }
            $slider = $slider->languageId($languageId);

            $sortBy = ['id','title','description'];
            $sortType = ['ASC','DESC','asc','desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'],$sortBy) && in_array($_GET['sortType'],$sortType)) {
                $slider = $slider->orderBy($_GET['sortBy'],$_GET['sortType']);
            }

            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $slider = $slider->searchParameter($_GET['searchParameter']);
            }


            if (\Request::route()->getName() == 'client.slider.index' || \Request::route()->getName() == 'client.slider.show') {
                return $this->successResponse(SliderResource::collection($slider->get()) , 'Data Get Successfully!');
            }
            return $this->successResponse(SliderResource::collection($slider->paginate($numOfResult)) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($slider)
    {
        try {
            $slider = Slider::sliderId($slider->id);
            if (isset($_GET['getLanguage']) && $_GET['getLanguage'] == '1') {
                $slider = $slider->with('language');
            }
            if (isset($_GET['getSliderType']) && $_GET['getSliderType'] == '1') {
                $slider = $slider->with('slider_type');
            }
            if (isset($_GET['getSliderNavigation']) && $_GET['getSliderNavigation'] == '1') {
                $slider = $slider->with('slider_navigation');
            }
            if (isset($_GET['getSliderGallary']) && $_GET['getSliderGallary'] == '1') {
                $slider = $slider->with('gallary')->with('gallary.detail');
            }
            
            return $this->successResponse(new SliderResource($slider->firstOrFail()) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $sql = new Slider;
            $parms['created_by'] = \Auth::id();
            $slider = $sql->create($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new SliderResource(Slider::with(['gallary', 'language', 'slider_type', 'slider_navigation'])->sliderId($slider->id)->firstOrFail()), 'Slider Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $slider)
    {
        try {
            $parms['updated_by'] = \Auth::id();
            $sql = $slider->update($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new SliderResource(Slider::with(['gallary', 'language', 'slider_type', 'slider_navigation'])->sliderId($slider->id)->firstOrFail()), 'Slider Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($Slider)
    {
        try {
            $sql = Slider::findOrFail($Slider);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse('', 'Slider Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
