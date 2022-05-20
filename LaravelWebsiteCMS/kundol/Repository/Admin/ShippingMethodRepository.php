<?php

namespace App\Repository\Admin;

use App\Contract\Admin\ShippingMethodInterface;
use App\Http\Resources\Admin\ShippingMethod as ShippingMethodResource;
use App\Models\Admin\Language;
use App\Models\Admin\ShippingMethod;
use App\Services\Admin\ShippingMethodDescriptionService;
use App\Traits\ApiResponser;
use DB;
use Illuminate\Support\Collection;

class ShippingMethodRepository implements ShippingMethodInterface
{
    use ApiResponser;
    public function all()
    {
        try {
            $shippingMethod = new ShippingMethod;
            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $shippingMethod = $shippingMethod->searchParameter($_GET['searchParameter']);
            }

            $sortBy = ['id'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $shippingMethod = $shippingMethod->orderBy($_GET['sortBy'], $_GET['sortType']);
            }
            $sortBy = ['name'];
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {

                $languageId = Language::defaultLanguage()->value('id');
                if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                    $language = Language::languageId($_GET['language_id'])->firstOrFail();
                    $languageId = $language->id;
                }
                $shippingMethodSortType = $shippingMethodSortBy = '';
                if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                    $shippingMethodSortType = $_GET['sortType'];
                    $shippingMethodSortBy = $_GET['sortBy'];
                }
                if ($shippingMethodSortType && $shippingMethodSortBy)
                    $shippingMethod = $shippingMethod->getShippingMethodDetailByLanguageId($languageId, $shippingMethodSortBy, $shippingMethodSortType);
                $shippingMethod = $shippingMethod->getShippingMethodByLanguageId($languageId);
            }

            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            return $this->successResponse(ShippingMethodResource::collection($shippingMethod->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($shippingMethod)
    {
        try {
            if (isset($_GET['getDetail']) && $_GET['getDetail'] === '1') {
                return $this->successResponse(new ShippingMethodResource(ShippingMethod::with('ShippingMethodDescriptions')->shippingMethodId($shippingMethod->id)->firstOrFail()), 'Data Get Successfully!');
            }

            return $this->successResponse(new ShippingMethodResource($shippingMethod), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $shippingMethod)
    {
        DB::beginTransaction();
        try {
            if(isset($parms['is_default']) && $parms['is_default'] == '1'){
                ShippingMethod::where('is_default', '1')->update([
                    'is_default' => '0'
                ]);
            }
            // return $parms;
            $parms['updated_by'] = \Auth::id();
            $sql = $shippingMethod->update($parms);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse();
        }

        if (isset($parms['updateDescription']) && $parms['updateDescription'] == '1') {
            // update payment method descrption

            $shippingMethodDescriptionService = new ShippingMethodDescriptionService;
            $sql = $shippingMethodDescriptionService->update($parms, $shippingMethod->id);
        }

        if ($sql) {
            DB::commit();
            return $this->successResponse(new ShippingMethodResource($shippingMethod), 'Shipping Method Update Successfully!');
        } else {
            DB::rollback();
            return $this->errorResponse();
        }
    }

    public function isDefault()
    {
        try {
            $shippingMethod = ShippingMethod::where('is_default', '1')->first();
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse();
        }

        if ($shippingMethod) {
            DB::commit();
            return $this->successResponse(new ShippingMethodResource($shippingMethod), 'Shipping Method Get Successfully!');
        } else {
            DB::rollback();
            return $this->errorResponse();
        }
    }
}
