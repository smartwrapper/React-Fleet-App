<?php

namespace App\Http\Controllers\API\Web;

use App\Contract\Web\PointInterface;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

class PointController extends Controller
{
    private $PointRepository;

    public function __construct(PointInterface $PointRepository)
    {
        $this->PointRepository = $PointRepository;
    }

    public function index(Request $request)
    {
        return $this->PointRepository->all($request);
    }

    public function store(Request $request)
    {
        return $this->PointRepository->store();
    }
}
