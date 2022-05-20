<?php

namespace App\Repository\Admin;

use App\Contract\Admin\AttributeInterface;
use App\Http\Resources\Admin\Attribute as AttributeResource;
use App\Models\Admin\Attribute;
use App\Models\Admin\AttributeDetail;
use App\Models\Admin\Language;
use App\Models\Admin\Product;
use App\Traits\ApiResponser;
use App\Services\Admin\DeleteValidatorService;

use Illuminate\Support\Collection;

class AttributeRepository implements AttributeInterface
{
    use ApiResponser;
    /**
     * @return Collection
     */
    public function all()
    {
        try {
            $attribute = new Attribute;
            if (isset($_GET['getVariation']) && $_GET['getVariation'] == '1') {
                $attribute = $attribute->with('variation');
            }
            if (isset($_GET['getDetailWithLanguage']) && $_GET['getDetailWithLanguage'] == '1') {
                $attribute = $attribute->with('attribute_detail.language');
            }
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $attribute = $attribute->searchParameter($_GET['searchParameter']);
            }


            $languageId = Language::defaultLanguage()->value('id');
            if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                $languageId = Language::languageId($_GET['language_id'])->value('id');
            }
            $attribute = $attribute->getAttributeDetailByLanguageId($languageId);

            if (isset($_GET['getVariationByLarguage']) && $_GET['getVariationByLarguage'] == '1') {
                $attribute = $attribute->getVariationDetailByLanguageId($languageId);
            }

            $sortBy = ['id'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $attribute = $attribute->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            $sortBy = ['name'];
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $attributeSortType = $attributeSortBy = '';
                if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                    $attributeSortType = $_GET['sortType'];
                    $attributeSortBy = $_GET['sortBy'];
                    $attribute = $attribute->sortByAttributeDetail($attributeSortBy, $attributeSortType, $languageId);
                }
            }

            return $this->successResponse(AttributeResource::collection($attribute->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($attribute)
    {
        // return $attribute->id;
        $attribute = Attribute::attributeId($attribute->id);
        try {
            if (isset($_GET['getVariation']) && $_GET['getVariation'] == '1') {
                $attribute = $attribute->with('variation');
            }
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $attribute = $attribute->with(['attribute_detail', 'attribute_detail.language']);
            }

            return $this->successResponse(new AttributeResource($attribute->firstOrFail()), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $sql = new Attribute;
            $sql = $sql->create($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        foreach ($parms['name'] as $i => $name) {
            AttributeDetail::create([
                'name' => $name,
                'language_id' => $parms['language_id'][$i],
                'attribute_id' => $sql->id,
            ]);
        }

        if ($sql) {
            return $this->successResponse(new AttributeResource($sql), 'Attribute Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $attribute)
    {
        // return $parms;
        try {
            $attribute->update($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        try {
            AttributeDetail::where('attribute_id', $attribute->id)->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        foreach ($parms['name'] as $i => $name) {
            AttributeDetail::create([
                'name' => $name,
                'language_id' => $parms['language_id'][$i],
                'attribute_id' => $attribute->id,
            ]);
        }
        if ($attribute) {
            return $this->successResponse(new AttributeResource($attribute), 'Attribute Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($attribute)
    {

        $deleteValidatorService = new DeleteValidatorService;
        $isExistedInOtherTable = $deleteValidatorService->deleteValidate('attribute_id', $attribute);

        if ($isExistedInOtherTable === 1) {
            return $this->errorResponse('linked in another table can not be deleted', 422, null);
        }


        try {
            $sql = Attribute::findOrFail($attribute);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse('', 'Attribute Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
