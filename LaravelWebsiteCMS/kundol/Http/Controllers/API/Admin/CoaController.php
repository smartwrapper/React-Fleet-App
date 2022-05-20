<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\CoaInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\CoaRequest;
use App\Models\Admin\Coa;
use App\Repository\Admin\CoaRepository;

class CoaController extends Controller
{
    private $CoaRepository;

    public function __construct(CoaInterface $CoaRepository)
    {
        $this->CoaRepository = $CoaRepository;
    }

    public function index()
    {
        return $this->CoaRepository->all();
    }

}
