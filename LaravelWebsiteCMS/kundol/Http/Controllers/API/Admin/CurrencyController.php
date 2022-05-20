<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\CurrencyInterface;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CurrencyRequest;
use App\Models\Admin\Currency;
use App\Repository\Admin\CurrencyRepository;

class CurrencyController extends Controller
{

    private $CurrencyRepository;

    public function __construct(CurrencyInterface $CurrencyRepository)
    {
        $this->CurrencyRepository = $CurrencyRepository;
    }

    public function index()
    {
        return $this->CurrencyRepository->all();
    }


    public function show(Currency $currency)
    {
        return $this->CurrencyRepository->show($currency);
    }

    public function store(CurrencyRequest $request)
    {
        $parms = $request->all();
        return $this->CurrencyRepository->store($parms);
    }

    public function update(CurrencyRequest $request, Currency $currency)
    {
        $parms = $request->all();
        return $this->CurrencyRepository->update($parms, $currency);
    }

    public function destroy($id)
    {
        return $this->CurrencyRepository->destroy($id);
    }

    public function isDefault(Request $request)
    {
        $parms = $request->all();
        return $this->CurrencyRepository->isDefault($parms);
    }

}
