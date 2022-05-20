<?php

namespace App\Services\Admin;

use App\Models\Admin\CategoryDetail;
use App\Traits\ApiResponser;
use DB;

class CategoryDetailService
{
    use ApiResponser;
    public function update($parms, $categoryId)
    {
        foreach ($parms['language_id'] as $i => $data) {
            $arr['language_id'] = $parms['language_id'][$i];
            $arr['description'] = $parms['description'][$i];
            $arr['category_name'] = $parms['category_name'][$i];
            try {
                $arr['category_id'] = $categoryId;
                $query = CategoryDetail::updateOrCreate(
                    ['category_id' => $categoryId, 'language_id' => $arr['language_id']],
                    $arr
                );
            } catch (Exception $e) {
                DB::rollback();
                return $this->errorResponse();
            }
        }

        return $query;
    }

    public function updateValidate($parms)
    {
        foreach ($parms['language_id'] as $i => $data) {
            if (!isset($parms['language_id'][$i]) || !isset($parms['description'][$i]) || !isset($parms['category_name'][$i])) {
                return $this->errorResponse('language_id, description and  category_name is required!', 401);
            }
        }
        return 1;
    }

    public function storeValidate($parms)
    {
        foreach ($parms['language_id'] as $i => $data) {
            if (!isset($parms['language_id'][$i]) || !isset($parms['description'][$i]) || !isset($parms['category_name'][$i])) {
                return $this->errorResponse('language_id, description and category_name is required!', 401);
            }
        }
        return 1;
    }

    public function store($parms, $categoryId)
    {
        foreach ($parms['language_id'] as $i => $data) {

            $arr['language_id'] = $parms['language_id'][$i];
            $arr['description'] = $parms['description'][$i];
            $arr['category_name'] = $parms['category_name'][$i];
            try {
                $arr['category_id'] = $categoryId;
                $query = new CategoryDetail;
                $query->create($arr);
            } catch (Exception $e) {
                DB::rollback();
                return $this->errorResponse();
            }
        }
        return true;
    }
}
