<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\MembershipInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\MembershipRequest;
use App\Models\Admin\Membership;
use App\Repository\Admin\MembershipRepository;

class MembershipController extends Controller
{
    private $membershipRepository;

    public function __construct(MembershipInterface $membershipRepository)
    {
        $this->membershipRepository = $membershipRepository;
    }

    public function index()
    {
        return $this->membershipRepository->all();
    }

    public function store(MembershipRequest $request)
    {
        $parms = $request->all();
        return $this->membershipRepository->store($parms);
    }


}
