<?php

namespace App\Contract\Admin;

interface NewsletterInterface
{
    public function index();

    public function store(array $parms);

}
