<?php

namespace App\Repository\Web;

use App\Contract\Web\CompareInterface;
use App\Http\Resources\Web\Compare as CompareResource;
use App\Models\Web\Compare;
use App\Traits\ApiResponser;
use Auth;
use Illuminate\Support\Collection;
use App\Models\Admin\Language;
class CompareRepository implements CompareInterface
{
    use ApiResponser;
    public function all()
    {
        // dd(\Request::route()->getName());
        try {
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            $compare = new Compare;
            if (isset($_GET['products']) && $_GET['products'] == 1) {
                $compare = $compare->with('products');
            }
            $compare = $compare->with('products.product_attribute.attribute.attribute_detail');
            $languageId = Language::defaultLanguage()->value('id');
            if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                $language = Language::languageId($_GET['language_id'])->firstOrFail();
                $languageId = $language->id;
            }
            if (isset($_GET['getCategory']) && $_GET['getCategory'] == '1') {
                $compare = $compare->getCategoryDetailByLanguageId($languageId);
            }
            if (isset($_GET['stock']) && $_GET['stock'] == '1') {
                $compare = $compare->with('products.stock');
            }
            if (isset($_GET['stock']) && $_GET['stock'] == '1') {
                $compare = $compare->with('products.stock');
            }
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $compare = $compare->getProductDetailByLanguageId($languageId);
            }
            return $this->successResponse(CompareResource::collection($compare->customerId(Auth::id())->paginate($numOfResult)) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($compare)
    {
        try {
            return $this->successResponse(new CompareResource(Compare::CompareId($compare->id)->firstOrFail()) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $sql = new Compare;
            $sql = $sql->create($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse(new CompareResource($sql), 'Compare Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($compare)
    {
        try {
            $sql = Compare::findOrFail($compare);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse('', 'Compare Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

}
