<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\AvailableQtyInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\AvailableQtyRequest;

class AvailableQtyController extends Controller
{
    private $AvailableQtyRepository;

    public function __construct(AvailableQtyInterface $AvailableQtyRepository)
    {
        $this->AvailableQtyRepository = $AvailableQtyRepository;
    }

    public function index(AvailableQtyRequest $request)
    {
        return $this->AvailableQtyRepository->all($request);
    }
}
