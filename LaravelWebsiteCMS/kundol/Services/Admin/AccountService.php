<?php

namespace App\Services\Admin;

use App\Models\Admin\Account;
use App\Models\Admin\DefaultAccount;
use App\Traits\ApiResponser;

class AccountService
{
    use ApiResponser;
    public function createAccount($type, $name, $id)
    {
        $default_account = DefaultAccount::type(strtolower($type))->first();
        if ($default_account) {
            $current_code =  Account::coaId($default_account->account_id)->first();
            $sql =  Account::parentId($default_account->account_id)->orderBy('id', 'DESC')->first();
            if ($sql) {
                $last_code = str_replace($current_code->code, '', $sql->code);
                $last_code = intVal($last_code);
                $last_code++;
                $new_code = $last_code;
                if ($last_code < 10) {
                    $new_code = '0' . $last_code;
                }
                $new_code = $current_code->code . $new_code;
            } else {
                $new_code = $current_code->code . '01';
            }
            $parms['account_type'] = $current_code->account_type;
            $parms['code'] = $new_code;
            $parms['status'] = '1';
            $parms['parent_id'] = $default_account->account_id;
            $parms['name'] = $name;
            $parms['reference_id'] = $id;
            $parms['type'] = $type;
            $sql = new Account;
            $sql = $sql->create($parms);
        }
    }
}
