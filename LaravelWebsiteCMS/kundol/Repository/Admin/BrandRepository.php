<?php

namespace App\Repository\Admin;

use App\Contract\Admin\BrandInterface;
use App\Http\Resources\Admin\Brand as BrandResource;
use App\Models\Admin\Brand;
use App\Models\Admin\Product;
use App\Services\Admin\DeleteValidatorService;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class BrandRepository implements BrandInterface
{
    use ApiResponser;
    public function all()
    {
        try {
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            $brand = new Brand;
            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $brand = $brand->searchParameter($_GET['searchParameter']);
            }
            $sortBy = ['id','name'];
            $sortType = ['ASC','DESC','asc','desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'],$sortBy) && in_array($_GET['sortType'],$sortType)) {
                $brand = $brand->orderBy($_GET['sortBy'],$_GET['sortType']);
            }
            return $this->successResponse(BrandResource::collection($brand->paginate($numOfResult)) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($brand)
    {
        try {
            return $this->successResponse(new BrandResource($brand) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $brand_slug = strtolower($parms['name']);
            $parms['brand_slug'] = str_replace(" ","-",$brand_slug);
            $sql = new Brand;
            $sql = $sql->create($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse(new BrandResource($sql), 'Brand Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $brand)
    {
        try {
            $brand_slug = strtolower($parms['name']);
            $parms['brand_slug'] = str_replace(" ","-",$brand_slug);
            $brand->update($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($brand) {
            return $this->successResponse(new BrandResource($brand), 'Brand Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($brand)
    {
        $deleteValidatorService = new DeleteValidatorService;
        $isExistedInOtherTable = $deleteValidatorService->deleteValidate('brand_id', $brand);
        
        if($isExistedInOtherTable === 1){
            return $this->errorResponse('linked in another table can not be deleted',422,null);
        }
        
        try {
            $sql = Brand::findOrFail($brand);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse('', 'Brand Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

}
