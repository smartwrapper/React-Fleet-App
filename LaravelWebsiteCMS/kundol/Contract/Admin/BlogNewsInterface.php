<?php

namespace App\Contract\Admin;

interface BlogNewsInterface
{
    public function all();

    public function show($blogNews);

    public function store(array $parms);

    public function update(array $parms, $blogNews);

    public function destroy($blogNews);

}
