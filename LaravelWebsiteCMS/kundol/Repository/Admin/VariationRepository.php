<?php

namespace App\Repository\Admin;

use App\Contract\Admin\VariationInterface;
use App\Http\Resources\Admin\Variation as VariationResource;
use App\Models\Admin\Attribute;
use App\Models\Admin\Language;
use App\Models\Admin\Product;
use App\Models\Admin\Variation;
use App\Models\Admin\VariationDetail;
use App\Traits\ApiResponser;
use App\Services\Admin\DeleteValidatorService;

use Illuminate\Support\Collection;

class VariationRepository implements VariationInterface
{
    use ApiResponser;
    /**
     * @return Collection
     */
    public function all()
    {
        $languageId = Language::defaultLanguage()->value('id');
        if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
            $languageId = Language::languageId($_GET['language_id'])->value('id');
        }
        $variation = new Variation;

        if (isset($_GET['getAttribute']) && $_GET['getAttribute'] == '1') {
            $variation = $variation->with('attribute')->with('attribute.attribute_detail')->with('attribute.attribute_detail.language')->getAttributeDetailByLanguageId($languageId);
        }
        if (isset($_GET['getDetailWithLanguage']) && $_GET['getDetailWithLanguage'] == '1') {
            $variation = $variation->with('variation_detail.language');
        }
        if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
            $variation = $variation->searchParameter($_GET['searchParameter']);
        }


        $variation = $variation->getVariationDetailByLanguageId($languageId);
        if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
            $numOfResult = $_GET['limit'];
        } else {
            $numOfResult = 100;
        }
        $sortBy = ['id'];
        $sortType = ['ASC', 'DESC', 'asc', 'desc'];
        if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
            $variation = $variation->orderBy($_GET['sortBy'], $_GET['sortType']);
        }

        $sortBy = ['name'];
        if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
            $variationSortType = $variationSortBy = '';
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $variationSortType = $_GET['sortType'];
                $variationSortBy = $_GET['sortBy'];
                $variation = $variation->sortByVariationDetail($variationSortBy, $variationSortType, $languageId);
            }
        }

        $sortBy = ['attribute'];
        if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
            $attributeSortType = $attributeSortBy = '';
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $attributeSortType = $_GET['sortType'];
                $attributeSortBy ='name';
                $variation = $variation->sortByAttributeDetail($attributeSortBy, $attributeSortType, $languageId);
            }
        }
        

        try {
            return $this->successResponse(VariationResource::collection($variation->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($variation)
    {
        $variation = Variation::variationId($variation->id);
        try {
            if (isset($_GET['getAttribute']) && $_GET['getAttribute'] == '1') {
                $variation = $variation->with('attribute');
            }
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $variation = $variation->with('variation_detail');
            }
            if (isset($_GET['getDetailWithLanguage']) && $_GET['getDetailWithLanguage'] == '1') {
                $variation = $variation->with('variation_detail.language');
            }

            return $this->successResponse(new VariationResource($variation->firstOrFail()), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $sql = new Variation;
            $sql = $sql->create($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        foreach ($parms['name'] as $i => $name) {
            VariationDetail::create([
                'name' => $name,
                'language_id' => $parms['language_id'][$i],
                'variation_id' => $sql->id,
            ]);
        }

        if ($sql) {
            return $this->successResponse(new VariationResource($sql), 'Variation Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $variation)
    {
        try {
            $variation->update($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        try {
            VariationDetail::where('variation_id', $variation->id)->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        foreach ($parms['name'] as $i => $name) {
            VariationDetail::create([
                'name' => $name,
                'language_id' => $parms['language_id'][$i],
                'variation_id' => $variation->id,
            ]);
        }

        if ($variation) {
            return $this->successResponse(new VariationResource($variation), 'Variation Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($variation)
    {
        
        $deleteValidatorService = new DeleteValidatorService;
        $isExistedInOtherTable = $deleteValidatorService->deleteValidate('variation_id', $variation);

        if ($isExistedInOtherTable === 1) {
            return $this->errorResponse('linked in another table can not be deleted', 422, null);
        }

        try {
            $sql = Variation::findOrFail($variation);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse('', 'Variation Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
