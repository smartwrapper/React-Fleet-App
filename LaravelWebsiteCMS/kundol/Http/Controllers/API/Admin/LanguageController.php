<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\LanguageInterface;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LanguageRequest;
use App\Models\Admin\Language;
use App\Repository\Admin\LanguageRepository;

class LanguageController extends Controller
{
    private $LanguageRepository;

    public function __construct(LanguageInterface $LanguageRepository)
    {
        $this->LanguageRepository = $LanguageRepository;
    }

    public function index()
    {
        return $this->LanguageRepository->all();
    }

    public function show(Language $language)
    {
        return $this->LanguageRepository->show($language);
    }

    public function store(LanguageRequest $request)
    {
        $parms = $request->all();
        return $this->LanguageRepository->store($parms);
    }

    public function update(LanguageRequest $request, Language $language)
    {
        $parms = $request->all();
        return $this->LanguageRepository->update($parms, $language);
    }

    public function destroy($id)
    {
        return $this->LanguageRepository->destroy($id);
    }

    public function isDefault(Request $request)
    {
        $parms = $request->all();
        return $this->LanguageRepository->isDefault($parms);
    }

}
