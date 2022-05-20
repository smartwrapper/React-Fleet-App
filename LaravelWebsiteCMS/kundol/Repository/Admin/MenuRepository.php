<?php

namespace App\Repository\Admin;

use App\Contract\Admin\MenuInterface;
use App\Http\Resources\Admin\Menu as MenuResource;
use App\Models\Admin\Menu;
use App\Models\Admin\MenuDetail;
use App\Models\Admin\Language;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class MenuRepository implements MenuInterface
{
    use ApiResponser;
    /**
     * @return Collection
     */
    public function all()
    {
        try {
            $Menu = new Menu;
            if (isset($_GET['getDetailWithLanguage']) && $_GET['getDetailWithLanguage'] == '1') {
                $Menu = $Menu->with('menu_detail.language');
            }
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $Menu = $Menu->searchParameter($_GET['searchParameter']);
            }


            $languageId = Language::defaultLanguage()->value('id');
            if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                $languageId = Language::languageId($_GET['language_id'])->value('id');
            }
            $Menu = $Menu->getMenuDetailByLanguageId($languageId);

            $sortBy = ['id'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $Menu = $Menu->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            $sortBy = ['name'];
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $MenuSortType = $MenuSortBy = '';
                if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                    $MenuSortType = $_GET['sortType'];
                    $MenuSortBy = $_GET['sortBy'];
                    $Menu = $Menu->sortByMenuDetail($MenuSortBy, $MenuSortType, $languageId);
                }
            }

            return $this->successResponse(MenuResource::collection($Menu->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($Menu)
    {
        // return $Menu->id;
        $Menu = Menu::menuId($Menu->id);
        try {
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $Menu = $Menu->with(['menu_detail', 'menu_detail.language']);
            }

            return $this->successResponse(new MenuResource($Menu->firstOrFail()), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $sql = new Menu;
            $sql = $sql->create($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        foreach ($parms['name'] as $i => $name) {
            MenuDetail::create([
                'name' => $name,
                'language_id' => $parms['language_id'][$i],
                'menu_id' => $sql->id,
            ]);
        }

        if ($sql) {
            return $this->successResponse(new MenuResource($sql), 'Menu Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $Menu)
    {
        // return $parms;
        try {
            $Menu->update($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        try {
            MenuDetail::where('menu_id', $Menu->id)->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        foreach ($parms['name'] as $i => $name) {
            MenuDetail::create([
                'name' => $name,
                'language_id' => $parms['language_id'][$i],
                'menu_id' => $Menu->id,
            ]);
        }
        if ($Menu) {
            return $this->successResponse(new MenuResource($Menu), 'Menu Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($Menu)
    {
        try {
            $sql = Menu::findOrFail($Menu);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse('', 'Menu Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
