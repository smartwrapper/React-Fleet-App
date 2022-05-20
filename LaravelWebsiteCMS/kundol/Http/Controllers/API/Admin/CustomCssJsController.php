<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\CustomCssJsInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\CustomCssJsRequest;
use App\Repository\Admin\CustomCssJsRepository;

class CustomCssJsController extends Controller
{
    private $customCssJsRepository;

    public function __construct(CustomCssJsInterface $customCssJsRepository)
    {
        $this->customCssJsRepository = $customCssJsRepository;
    }

    public function index()
    {
        return $this->customCssJsRepository->index();
    }

    public function store(CustomCssJsRequest $request)
    {
        $parms = $request->all();
        return $this->customCssJsRepository->store($parms);
    }

}
