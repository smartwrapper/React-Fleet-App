<?php

namespace App\Services\Admin;

use App\Traits\ApiResponser;
use DB;

class DeleteValidatorService
{
    use ApiResponser;
    public function deleteValidate($column, $column_id)
    {
        $databaseName = \Config::get('database.connections');
        
        $isExistedInOtherTable = 0;
        $tables = DB::Select(DB::raw('SELECT Distinct(TABLE_NAME) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA ="'.$databaseName['mysql']['database'].'"'));
        for ($i = 0; $i < count($tables); $i++) {

            $isColumnExisted = DB::Select(DB::raw("SHOW COLUMNS FROM " . $tables[$i]->TABLE_NAME . " LIKE '" . $column . "'"));
            if (count($isColumnExisted) > 0) {
                if($tables[$i]->TABLE_NAME == "gallary_detail" && $column == "gallary_id"){
                    $isExistedInOtherTable = 0;
                }
                else if (DB::table($tables[$i]->TABLE_NAME)->where($column, $column_id)->count() > 0) {
                    $isExistedInOtherTable = 1;
                }

            }

        }

        // $isExistedInOtherTable;
        return $isExistedInOtherTable;

    }
}
