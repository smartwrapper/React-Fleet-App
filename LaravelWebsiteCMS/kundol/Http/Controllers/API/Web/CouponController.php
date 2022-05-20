<?php

namespace App\Http\Controllers\API\Web;

use App\Contract\Web\CouponInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\CouponRequest;
use App\Repository\Web\CouponRepository;

class CouponController extends Controller
{
    private $CouponRepository;

    public function __construct(CouponInterface $CouponRepository)
    {
        $this->CouponRepository = $CouponRepository;
    }

    public function store(CouponRequest $request)
    {
        $parms = $request->all();
        return $this->CouponRepository->store($parms);
    }


}
