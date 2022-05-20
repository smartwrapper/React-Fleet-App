<?php

namespace App\Repository\Admin;

use App\Contract\Admin\ConstantBannerInterface;
use App\Http\Resources\Admin\ConstantBanner as ConstantBannerResource;
use App\Models\Admin\ConstantBanner;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class ConstantBannerRepository implements ConstantBannerInterface
{
    use ApiResponser;
    public function all()
    {
        try {
            if(isset($_GET['title']) && isset($_GET['language_id']) ){
            if($_GET['title'] == 'banner1'){
                $title = 'banner1';
            }

            if($_GET['title'] == 'banner2' or $_GET['title'] == 'banner3' or $_GET['title'] == 'banner4'){
                $title = 'banner2';
            }

            if($_GET['title'] == 'banner5' or $_GET['title'] == 'banner6'){
                $title = 'banner5';
            }

            if($_GET['title'] == 'banner7' or $_GET['title'] == 'banner8'){
                $title = 'banner7';
            }

            if($_GET['title'] == 'banner9'){
                $title = 'banner9';
            }

            if($_GET['title'] == 'banner10' or $_GET['title'] == 'banner11' or $_GET['title'] == 'banner12'){
                $title = 'banner10';
            }

            if($_GET['title'] == 'banner13' or $_GET['title'] == 'banner14' or $_GET['title'] == 'banner15'){
                $title = 'banner13';
            }

            if($_GET['title'] == 'banner16' or $_GET['title'] == 'banner17'){
                $title = 'banner16';
            }

            if($_GET['title'] == 'banner18' or $_GET['title'] == 'banner19'){
                $title = 'banner18';
            }

            if($_GET['title'] == 'rightsliderbanner'){
                $title = 'rightsliderbanner';
            }

            if($_GET['title'] == 'leftsliderbanner'){
                $title = 'rightsliderbanner';
            }


            $Constantbanner = new ConstantBanner;
            if (isset($_GET['getGallary']) && $_GET['getGallary'] == '1') {
                $Constantbanner = $Constantbanner->with('gallary');
            }

            if (isset($_GET['title'])) {
                $Constantbanner = $Constantbanner->ConstantbannerTitle($title);
            }
            if(isset($_GET['language_id'])){
                $Constantbanner = $Constantbanner->ContantBannerLanguage($_GET['language_id']);
            }
            if (isset($_GET['getlanguage']) && $_GET['getlanguage'] == '1') {
                
                $Constantbanner = $Constantbanner->with('language');
            }
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            $sortBy = ['id', 'title', 'description', 'status'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $Constantbanner = $Constantbanner->orderBy($_GET['sortBy'], $_GET['sortType']);
            }
            if (\Request::route()->getName() == 'client.Constantbanner.index') {
                return $this->successResponse(ConstantBannerResource::collection($Constantbanner->get()), 'Data Get Successfully!');
            }

                return $this->successResponse(ConstantBannerResource::collection($Constantbanner->paginate($numOfResult)), 'Data Get Successfully!');
                
            }
            else{
                return $this->errorResponse('Please choose a Valid title Or Language',422,[]);
            }
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($Constantbanner)
    {
        try {
            $Constantbanner = ConstantBanner::ConstantbannerId($Constantbanner->id);
            if (isset($_GET['getGallary']) && $_GET['getGallary'] == '1') {
                $Constantbanner = $Constantbanner->with('gallary');
            }

            if (isset($_GET['getlanguage']) && $_GET['getlanguage'] == '1') {
                $Constantbanner = $Constantbanner->with('language');
            }
            return $this->successResponse(new ConstantBannerResource($Constantbanner->firstOrFail()), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $sql = new ConstantBanner;
            $parms['created_by'] = \Auth::id();
            $Constantbanner = $sql->create($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new ConstantBannerResource(ConstantBanner::with(['gallary', 'slider_navigation', 'language'])->ConstantbannerId($Constantbanner->id)->firstOrFail()), 'ConstantBanner Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $Constantbanner)
    {
        try {
            $parms['updated_by'] = \Auth::id();
            $sql = $Constantbanner->update($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new ConstantBannerResource(ConstantBanner::with('gallary')->ConstantbannerId($Constantbanner->id)->firstOrFail()), 'ConstantBanner Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($Constantbanner)
    {
        try {
            $sql = ConstantBanner::findOrFail($Constantbanner);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse('', 'ConstantBanner Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
