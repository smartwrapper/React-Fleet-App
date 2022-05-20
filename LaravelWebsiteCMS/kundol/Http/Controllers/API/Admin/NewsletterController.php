<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\NewsletterInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\NewsletterRequest;
use App\Repository\Admin\NewsletterRepository;

class NewsletterController extends Controller
{
    private $newsletterRepository;

    public function __construct(NewsletterInterface $newsletterRepository)
    {
        $this->newsletterRepository = $newsletterRepository;
    }

    public function index()
    {
        return $this->newsletterRepository->index();
    }

    public function store(NewsletterRequest $request)
    {
        $parms = $request->all();
        return $this->newsletterRepository->store($parms);
    }

}
