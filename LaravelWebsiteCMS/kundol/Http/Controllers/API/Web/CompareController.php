<?php

namespace App\Http\Controllers\API\Web;

use App\Contract\Web\CompareInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\CompareRequest;
use App\Models\Web\Compare;
use App\Repository\Web\CompareRepository;

class CompareController extends Controller
{
    private $CompareRepository;

    public function __construct(CompareInterface $CompareRepository)
    {
        $this->CompareRepository = $CompareRepository;
    }

    public function index()
    {

        return $this->CompareRepository->all();
    }

    public function show(Compare $Compare)
    {
        return $this->CompareRepository->show($Compare);
    }

    public function store(CompareRequest $request)
    {
        $parms = $request->all();
        return $this->CompareRepository->store($parms);
    }

    public function destroy($id)
    {
        return $this->CompareRepository->destroy($id);
    }

}
