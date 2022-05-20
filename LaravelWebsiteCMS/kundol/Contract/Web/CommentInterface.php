<?php

namespace App\Contract\Web;

interface CommentInterface
{
    public function all();
    
    public function store(array $parms);

    public function reply(array $parms);
}
