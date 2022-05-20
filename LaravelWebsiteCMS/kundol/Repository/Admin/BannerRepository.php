<?php

namespace App\Repository\Admin;

use App\Contract\Admin\BannerInterface;
use App\Http\Resources\Admin\Banner as BannerResource;
use App\Models\Admin\Banner;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class BannerRepository implements BannerInterface
{
    use ApiResponser;
    public function all()
    {
        try {
            $banner = new Banner;
            if (isset($_GET['getBannerNavigation']) && $_GET['getBannerNavigation'] == '1') {
                $banner = $banner->with('slider_navigation');
            }
            if (isset($_GET['getBannerGallary']) && $_GET['getBannerGallary'] == '1') {
                $banner = $banner->with('gallary')->with('language');
            }
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            $sortBy = ['id', 'title', 'description', 'status'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $banner = $banner->orderBy($_GET['sortBy'], $_GET['sortType']);
            }
            if (\Request::route()->getName() == 'client.banner.index') {
                return $this->successResponse(BannerResource::collection($banner->get()), 'Data Get Successfully!');
            }
            return $this->successResponse(BannerResource::collection($banner->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($banner)
    {
        try {
            $banner = Banner::bannerId($banner->id);
            if (isset($_GET['getBannerNavigation']) && $_GET['getBannerNavigation'] == '1') {
                $banner = $banner->with('slider_navigation');
            }
            if (isset($_GET['getBannerGallary']) && $_GET['getBannerGallary'] == '1') {
                $banner = $banner->with('gallary');
            }
            return $this->successResponse(new BannerResource($banner->firstOrFail()), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $sql = new Banner;
            $parms['created_by'] = \Auth::id();
            $banner = $sql->create($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new BannerResource(Banner::with(['gallary', 'slider_navigation', 'language'])->bannerId($banner->id)->firstOrFail()), 'Banner Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $banner)
    {
        try {
            $parms['updated_by'] = \Auth::id();
            $sql = $banner->update($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new BannerResource(Banner::with(['gallary', 'slider_navigation'])->bannerId($banner->id)->firstOrFail()), 'Banner Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($banner)
    {
        try {
            $sql = Banner::findOrFail($banner);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse('', 'Banner Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
