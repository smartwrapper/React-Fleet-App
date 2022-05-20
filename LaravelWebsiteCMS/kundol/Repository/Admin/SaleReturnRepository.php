<?php

namespace App\Repository\Admin;

use App\Contract\Admin\SaleReturnInterface;
use App\Http\Resources\Admin\SaleReturn as SaleReturnResource;
use App\Models\Admin\Language;
use App\Models\Admin\SaleReturn;
use App\Services\Admin\SaleReturnService;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class SaleReturnRepository implements SaleReturnInterface
{
    use ApiResponser;
    /**
     * @return Collection
     */
    public function all()
    {
        try {
            $SaleReturn = new SaleReturn;
            $languageId = Language::defaultLanguage()->value('id');
            if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                $language = Language::languageId($_GET['language_id'])->firstOrFail();
                $languageId = $language->id;
            }
            if (isset($_GET['getProduct']) && $_GET['getProduct'] == '1') {
                $SaleReturn = $SaleReturn->with('saleReturnDetail.product.detail', function ($querys) use ($languageId) {
                    $querys->where('language_id', $languageId);
                });
            }
            if (isset($_GET['getProductCombination']) && $_GET['getProductCombination'] == '1') {
                $SaleReturn = $SaleReturn->with('saleReturnDetail.product_combination');
            }
            if (isset($_GET['getCreatedBy']) && $_GET['getCreatedBy'] == '1') {
                $SaleReturn = $SaleReturn->with('user');
            }
            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $search = $_GET['searchParameter'];
                $purchase = $purchase->where('id', 'like', '%' . $_GET['searchParameter'] . '%')->orWhere('adjustment', 'like', '%' . $_GET['searchParameter'] . '%');
            }
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            return $this->successResponse(SaleReturnResource::collection($SaleReturn->paginate($numOfResult)), 'Data Get Successfully!');

        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($SaleReturn)
    {
        try {
            $SaleReturn = SaleReturn::saleReturnId($SaleReturn->id);
            $languageId = Language::defaultLanguage()->value('id');
            if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                $language = Language::languageId($_GET['language_id'])->firstOrFail();
                $languageId = $language->id;
            }
            if (isset($_GET['getProduct']) && $_GET['getProduct'] == '1') {
                $SaleReturn = $SaleReturn->with('saleReturnDetail.product.detail', function ($querys) use ($languageId) {
                    $querys->where('language_id', $languageId);
                });
            }
            if (isset($_GET['getProductCombination']) && $_GET['getProductCombination'] == '1') {
                $SaleReturn = $SaleReturn->with('saleReturnDetail.product_combination');
            }

            return $this->successResponse(new SaleReturnResource($SaleReturn->firstOrFail()), 'Data Get Successfully!');

        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $saleReturnService = new SaleReturnService;
            $sql = $saleReturnService->saleReturnData($parms, 'store');
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse('', 'SaleReturn Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $SaleReturn)
    {

        try {
            $SaleReturn->update($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($SaleReturn) {
            return $this->successResponse(new SaleReturnResource($SaleReturn), 'SaleReturn Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($SaleReturn)
    {
        try {
            $sql = SaleReturn::findOrFail($SaleReturn);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse('', 'SaleReturn Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

}
