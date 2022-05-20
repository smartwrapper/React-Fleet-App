<?php

namespace App\Repository\Admin;

use App\Contract\Admin\EmailTemplateSettingInterface;
use App\Http\Resources\Admin\EmailTemplateSetting as EmailTemplateSettingResource;
use App\Models\Admin\EmailTemplateSetting;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class EmailTemplateSettingRepository implements EmailTemplateSettingInterface
{
    use ApiResponser;
    /**
     * @return Collection
     */
    public function all()
    {
        try {
            $EmailTemplateSetting = new EmailTemplateSetting;
            if (isset($_GET['getVariation']) && $_GET['getVariation'] == '1') {
                $EmailTemplateSetting = $EmailTemplateSetting->with('variation');
            }
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            $sortBy = ['id', 'subject', 'body', 'type'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $EmailTemplateSetting = $EmailTemplateSetting->orderBy($_GET['sortBy'], $_GET['sortType']);
            }
            
            return $this->successResponse(EmailTemplateSettingResource::collection($EmailTemplateSetting->paginate($numOfResult)) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($EmailTemplateSetting)
    {
        try {
            if (isset($_GET['getVariation']) && $_GET['getVariation'] == '1') {
                return $this->successResponse(new EmailTemplateSettingResource(EmailTemplateSetting::with('variation')->EmailTemplateSettingId($EmailTemplateSetting->id)->firstOrFail()) , 'Data Get Successfully!');
            } else {
                
                return $this->successResponse(new EmailTemplateSettingResource($EmailTemplateSetting) , 'Data Get Successfully!');
            }
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $emailTemplateSetting = EmailTemplateSetting::where('type', $parms['type'])->first();
            if (!$emailTemplateSetting) {
                $sql = new EmailTemplateSetting;
                $sql = $sql->create($parms);
            } else {
                $sql = $this->update($parms, $emailTemplateSetting);
            }
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new EmailTemplateSettingResource($sql), 'EmailTemplateSetting Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $EmailTemplateSetting)
    {

        try {
            $EmailTemplateSetting->update($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($EmailTemplateSetting) {
            return $EmailTemplateSetting;
        } else {
            return false;
        }
    }

    public function destroy($EmailTemplateSetting)
    {
        try {
            $sql = EmailTemplateSetting::findOrFail($EmailTemplateSetting);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse('', 'EmailTemplateSetting Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
