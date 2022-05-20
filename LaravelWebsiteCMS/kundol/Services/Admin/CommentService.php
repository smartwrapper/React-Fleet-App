<?php

namespace App\Services\Admin;

use App\Traits\ApiResponser;
use App\Models\User;
use Auth;

class CommentService
{
    use ApiResponser;
    public function replyServiceValidation()
    {
        $sql = User::find(Auth::user()->id);
        if ($sql) {
            return 1;
        }
        return 0;
    }
}
