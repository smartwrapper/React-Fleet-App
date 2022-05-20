<?php

namespace App\Repository\Admin;

use App\Contract\Admin\HomeBannerInterface;
use App\Http\Resources\Admin\HomeBanner as HomeBannerResource;
use App\Models\Admin\HomeBanner;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class HomeBannerRepository implements HomeBannerInterface
{
    use ApiResponser;
    public function all()
    {
        try {
            
            $Homebanner = new HomeBanner;
            if (isset($_GET['getGallary']) && $_GET['getGallary'] == '1') {
                $Homebanner = $Homebanner->with('gallary');
            }

            if(isset($_GET['language_id'])){
                $Homebanner = $Homebanner->where('language_id',$_GET['language_id']);
            } else{
                return $this->errorResponse('Please choose a Valid Language',422,[]);
            }
            return $this->successResponse(HomeBannerResource::collection($Homebanner->get()), 'Data Get Successfully!');
                
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($Homebanner)
    {
        try {
            $Homebanner = HomeBanner::where('id',$Homebanner->id);
            if (isset($_GET['getGallary']) && $_GET['getGallary'] == '1') {
                $Homebanner = $Homebanner->with('gallary');
            }

            return $this->successResponse(new HomeBannerResource($Homebanner->firstOrFail()), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $sql = new HomeBanner;
            $parms['created_by'] = \Auth::id();
            $Homebanner = $sql->create($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new HomeBannerResource(HomeBanner::with(['gallary'])->HomebannerId($Homebanner->id)->firstOrFail()), 'HomeBanner Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $Homebanner)
    {
        try {
            $parms['updated_by'] = \Auth::id();
            $sql = $Homebanner->update($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new HomeBannerResource(HomeBanner::with('gallary')->where('id',$Homebanner->id)->firstOrFail()), 'HomeBanner Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($Homebanner)
    {
        try {
            $sql = HomeBanner::findOrFail($Homebanner);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse('', 'HomeBanner Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
