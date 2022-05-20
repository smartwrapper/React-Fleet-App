<?php

namespace App\Repository\Admin;

use App\Contract\Admin\LanguageInterface;
use App\Http\Resources\Admin\Language as LanguageResource;
use App\Models\Admin\Language;
use App\Traits\ApiResponser;
use App\Services\Admin\LanguageService;
use Illuminate\Support\Collection;
use DB;
use App\Services\Admin\DeleteValidatorService;


class LanguageRepository implements LanguageInterface
{
    use ApiResponser;
    /**
     * @return Collection
     */
    public function all()
    {
        try {
            if (isset($_GET['is_default']) && $_GET['is_default'] === '1') {
                return new LanguageResource(Language::defaultLanguage()->firstOrFail());
            }

            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            $language = new Language;
            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $language = $language->searchParameter($_GET['searchParameter']);
            }
            $sortBy = ['id', 'name'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $language = $language->orderBy($_GET['sortBy'], $_GET['sortType']);
            }
            return $this->successResponse(LanguageResource::collection($language->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($language)
    {
        try {

            return $this->successResponse(new LanguageResource($language), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        if (isset($parms['is_default']) && $parms['is_default'] == '1') {
            $languageService = new LanguageService;
            $languageService->resetDefualtLanguage();
        }

        try {
            $sql = new Language;
            $sql = $sql->create($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new LanguageResource($sql), 'Language Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $language)
    {
        if (isset($parms['is_default']) && $parms['is_default'] == '1') {
            $languageService = new LanguageService;
            $languageService->resetDefualtLanguage($language->id);
        }

        try {
            $language->update($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($language) {
            return $this->successResponse(new LanguageResource($language), 'Language Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($language)
    {
        
        $deleteValidatorService = new DeleteValidatorService;
        $isExistedInOtherTable = $deleteValidatorService->deleteValidate('language_id', $language);
        
        if($isExistedInOtherTable === 1){
            return $this->errorResponse('linked in another table can not be deleted',422,null);
        }
        
        try {
            $sql = Language::findOrFail($language);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse('', 'Language Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function isDefault(array $parms)
    {
        if (!isset($parms['is_default']) || !isset($parms['id'])) {
            return $this->errorResponse('is_default and id is required!');
        }
        DB::beginTransaction();
        $sql = Language::findOrFail($parms['id']);

        if (isset($parms['is_default']) && $parms['is_default'] == '1') {
            $languageService = new LanguageService;
            $languageService->resetDefualtLanguage($sql->id);
        }

        try {
            // return $parms;
            $sql->update($parms);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }

        if ($sql) {
            DB::commit();
            return $this->successResponse(new LanguageResource($sql), 'Language Update Successfully!');
        }
    }
}
