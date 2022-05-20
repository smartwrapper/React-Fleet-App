<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\EmailTemplateSettingInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\EmailTemplateSettingRequest;
use App\Models\Admin\EmailTemplateSetting;
use App\Repository\Admin\EmailTemplateSettingRepository;

class EmailTemplateSettingController extends Controller
{
    private $EmailTemplateSettingRepository;

    public function __construct(EmailTemplateSettingInterface $EmailTemplateSettingRepository)
    {
        $this->EmailTemplateSettingRepository = $EmailTemplateSettingRepository;
    }

    public function index()
    {
        return $this->EmailTemplateSettingRepository->all();
    }

    public function show(EmailTemplateSetting $emailTemplateSetting)
    {
        return $this->EmailTemplateSettingRepository->show($emailTemplateSetting);
    }

    public function store(EmailTemplateSettingRequest $request)
    {
        $parms = $request->all();
        return $this->EmailTemplateSettingRepository->store($parms);
    }

    public function destroy($id)
    {
        return $this->EmailTemplateSettingRepository->destroy($id);
    }

}
