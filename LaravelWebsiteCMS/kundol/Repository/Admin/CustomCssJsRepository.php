<?php

namespace App\Repository\Admin;

use App\Contract\Admin\CustomCssJsInterface;
use App\Http\Resources\Admin\CustomCssJs as CustomCssJsResource;
use App\Models\Admin\CustomCssJs;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class CustomCssJsRepository implements CustomCssJsInterface
{
    use ApiResponser;
    /**
     * @return Collection
     */

    public function index()
    {
        try {
            return $this->successResponse(new CustomCssJsResource(CustomCssJs::firstOrFail()), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        $customCssJs = CustomCssJs::first();
        try {
            if ($customCssJs) {
                $sql = $customCssJs->update($parms);
            } else {
                $customCssJs = new CustomCssJs;
                $customCssJs = $customCssJs->create($parms);
            }
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($customCssJs) {
            return $this->successResponse(new CustomCssJsResource($customCssJs), 'Custom style Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
