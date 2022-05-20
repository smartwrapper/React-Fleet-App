<?php

namespace App\Services\Admin;

use App\Models\Admin\Language;
use App\Traits\ApiResponser;
use DB;

class LanguageService
{
    use ApiResponser;
    public function resetDefualtLanguage($languageId = '')
    {
        try {
            if ($languageId != '') {
                Language::notLanguageId($languageId)->update(['is_default' => '0']);
            } else {
                Language::where('id','>','0')->update(['is_default' => '0']);
            }

        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }
    }
}
