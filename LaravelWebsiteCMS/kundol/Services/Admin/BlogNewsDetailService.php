<?php

namespace App\Services\Admin;

use App\Models\Admin\BlogNewsDetail;
use App\Traits\ApiResponser;
use DB;

class BlogNewsDetailService
{
    use ApiResponser;
    public function update($parms, $blogNewsId)
    {
        $query = BlogNewsDetail::where('blog_news_id', $blogNewsId)->delete();
        $arr['blog_news_id'] = $blogNewsId;
        foreach ($parms['language_id'] as $i => $data) {
            $arr['language_id'] = $parms['language_id'][$i];
            $arr['name'] = $parms['name'][$i];
            $arr['desc'] = $parms['desc'][$i];
            try {
                $query = new BlogNewsDetail;
                $query->create($arr);
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
            if (!isset($parms['language_id'][$i]) || !isset($parms['name'][$i]) || !isset($parms['id'][$i]) || !isset($parms['desc'][$i])) {
                return $this->errorResponse('id, language_id and name is required!', 401);
            }
        }
        return 1;
    }

    public function storeValidate($parms)
    {
        foreach ($parms['language_id'] as $i => $data) {
            if (!isset($parms['language_id'][$i]) || !isset($parms['name'][$i]) || !isset($parms['desc'][$i])) {
                return $this->errorResponse('language_id, description & name is required!', 401);
            }
        }
        return 1;
    }

    public function store($parms, $blogNewsId)
    {
        foreach ($parms['language_id'] as $i => $data) {

            $arr['language_id'] = $parms['language_id'][$i];
            $arr['name'] = $parms['name'][$i];
            $arr['desc'] = $parms['desc'][$i];
            try {
                $arr['blog_news_id'] = $blogNewsId;
                $query = new BlogNewsDetail;
                $query->create($arr);
            } catch (Exception $e) {
                DB::rollback();
                return $this->errorResponse();
            }
        }
        return true;
    }
}
