<?php

namespace App\Contract\Admin;

interface BlogCategoryInterface
{
    public function all();

    public function show($blogCategory);

    public function store(array $parms);

    public function update(array $parms, $blogCategory);

    public function destroy($blogCategory);

}
