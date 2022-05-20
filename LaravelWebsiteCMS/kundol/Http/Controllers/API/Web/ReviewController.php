<?php

namespace App\Http\Controllers\API\Web;

use App\Contract\Web\ReviewInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\ReviewRequest;
use App\Http\Requests\ReviewStatusRequest;
use App\Repository\Web\ReviewRepository;

class ReviewController extends Controller
{
    private $ReviewRepository;

    public function __construct(ReviewInterface $ReviewRepository)
    {
        $this->ReviewRepository = $ReviewRepository;
    }

    public function index()
    {
        return $this->ReviewRepository->all();
    }

    public function store(ReviewRequest $request)
    {
        $parms = $request->all();
        return $this->ReviewRepository->store($parms);
    }

    public function status(ReviewStatusRequest $request)
    {
        $parms = $request->all();
        return $this->ReviewRepository->status($parms);
    }
}
