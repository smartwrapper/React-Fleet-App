<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\CountryInterface;
use App\Http\Controllers\Controller as Controller;
use App\Models\Admin\Country;
use App\Http\Requests\CountryRequest;
use App\Repository\Admin\CountryRepository;

class CountryController extends Controller
{
    private $CountryRepository;

    public function __construct(CountryInterface $CountryRepository)
    {
        $this->CountryRepository = $CountryRepository;
    }

    public function index()
    {
        return $this->CountryRepository->all();
    }

    public function show(Country $country)
    {
        return $this->CountryRepository->show($country);
    }

    public function store(CountryRequest $request)
    {
        $parms = $request->all();
        return $this->CountryRepository->store($parms);
    }

    public function update(CountryRequest $request, Country $country)
    {
        $parms = $request->all();
        return $this->CountryRepository->update($parms, $country);
    }

    public function destroy($id)
    {
        return $this->CountryRepository->destroy($id);
    }

}
