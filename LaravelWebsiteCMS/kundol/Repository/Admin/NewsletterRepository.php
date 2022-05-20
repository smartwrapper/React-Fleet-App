<?php

namespace App\Repository\Admin;

use App\Contract\Admin\NewsletterInterface;
use App\Http\Resources\Admin\Newsletter as NewsletterResource;
use App\Models\Admin\Newsletter;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class NewsletterRepository implements NewsletterInterface
{
    use ApiResponser;
    /**
     * @return Collection
     */

    public function index()
    {
        try {
            return $this->successResponse(new NewsletterResource(Newsletter::firstOrFail()), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        $newsletter = Newsletter::first();
        try {
            if ($newsletter) {
                $sql = $newsletter->update($parms);
            } else {
                $newsletter = new Newsletter;
                $newsletter = $newsletter->create($parms);
            }
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($newsletter) {
            return $this->successResponse(new NewsletterResource($newsletter), 'Data Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
