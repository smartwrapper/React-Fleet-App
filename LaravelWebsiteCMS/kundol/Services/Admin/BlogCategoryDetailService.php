<?php

namespace App\Services\Admin;

use App\Models\Admin\BlogCategoryDetail;
use App\Traits\ApiResponser;
use DB;

class BlogCategoryDetailService
{
    use ApiResponser;
    public function update($parms, $categoryId)
    {
        foreach ($parms['language_id'] as $i => $data) {
            $arr['language_id'] = $parms['language_id'][$i];
            $arr['name'] = $parms['name'][$i];
            try {
                $arr['blog_category_id'] = $categoryId;
                $query = BlogCategoryDetail::updateOrCreate(
                    ['blog_category_id' => $categoryId, 'language_id' => $arr['language_id']],
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
        foreach ($parms['id'] as $i => $data) {
            if (!isset($parms['language_id'][$i]) || !isset($parms['name'][$i]) || !isset($parms['id'][$i])) {
                return $this->errorResponse('id, language_id and name is required!', 401);
            }
        }
        return 1;
    }

    public function storeValidate($parms)
    {
        foreach ($parms['language_id'] as $i => $data) {
            if (!isset($parms['language_id'][$i]) || !isset($parms['name'][$i])) {
                return $this->errorResponse('language_id & name is required!', 401);
            }
        }
        return 1;
    }

    public function store($parms, $categoryId)
    {
        foreach ($parms['language_id'] as $i => $data) {

            $arr['language_id'] = $parms['language_id'][$i];
            $arr['name'] = $parms['name'][$i];
            try {
                $arr['blog_category_id'] = $categoryId;
                $query = new BlogCategoryDetail;
                $query->create($arr);
            } catch (Exception $e) {
                DB::rollback();
                return $this->errorResponse();
            }
        }
        return true;
    }
}
