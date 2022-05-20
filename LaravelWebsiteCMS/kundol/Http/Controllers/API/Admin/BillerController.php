<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\BillerInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\BillerRequest;
use App\Models\Admin\Biller;
use App\Repository\Admin\BillerRepository;

class BillerController extends Controller
{
    private $billerRepository;

    public function __construct(BillerInterface $billerRepository)
    {
        $this->billerRepository = $billerRepository;
    }

    public function index()
    {
        return $this->billerRepository->all();
    }

    public function show(Biller $Biller)
    {
        return $this->billerRepository->show($Biller);
    }

    public function store(BillerRequest $request)
    {
        $parms = $request->all();
        return $this->billerRepository->store($parms);
    }

    public function update(BillerRequest $request, Biller $Biller)
    {
        $parms = $request->all();
        return $this->billerRepository->update($parms, $Biller);
    }

    public function destroy($id)
    {
        return $this->billerRepository->destroy($id);
    }

}
