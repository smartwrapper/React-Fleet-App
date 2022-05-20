<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\MenuInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Admin\Menu;
use App\Repository\Admin\MenuRepository;

class MenuController extends Controller
{
    private $MenuRepository;

    public function __construct(MenuInterface $MenuRepository)
    {
        $this->MenuRepository = $MenuRepository;
    }

    public function index()
    {
        return $this->MenuRepository->all();
    }

    public function show(Menu $menu)
    {
        return $this->MenuRepository->show($menu);
    }

    public function store(MenuRequest $request)
    {
        $parms = $request->all();
        return $this->MenuRepository->store($parms);
    }

    public function update(MenuRequest $request, Menu $menu)
    {
        $parms = $request->all();
        return $this->MenuRepository->update($parms, $menu);
    }

    public function destroy($id)
    {
        return $this->MenuRepository->destroy($id);
    }

}
