<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\BarcodeInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\BarcodeRequest;

class BarcodeController extends Controller
{
    private $BarcodeRepository;

    public function __construct(BarcodeInterface $BarcodeRepository)
    {
        $this->BarcodeRepository = $BarcodeRepository;
    }

    public function index(BarcodeRequest $request)
    {
        $parms = $request->all();
        return $this->BarcodeRepository->all($parms);
    }
}
