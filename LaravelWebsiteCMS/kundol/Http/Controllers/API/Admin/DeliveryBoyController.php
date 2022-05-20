<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\DeliveryBoyInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\DeliveryBoyRequest;
use App\Models\Admin\DeliveryBoy;
use App\Repository\Admin\DeliveryBoyRepository;
use Illuminate\Http\Request as HttpRequest;

class DeliveryBoyController extends Controller
{
    private $DeliveryBoyRepository;

    public function __construct(DeliveryBoyInterface $DeliveryBoyRepository)
    {
        $this->DeliveryBoyRepository = $DeliveryBoyRepository;
    }

    public function index()
    {
        return $this->DeliveryBoyRepository->all();
    }

    public function show(DeliveryBoy $DeliveryBoy)
    {
        return $this->DeliveryBoyRepository->show($DeliveryBoy);
    }

    public function store(DeliveryBoyRequest $request)
    {
        $parms = $request->all();
        return $this->DeliveryBoyRepository->store($parms);
    }

    public function update(DeliveryBoyRequest $request, DeliveryBoy $DeliveryBoy)
    {
        $parms = $request->all();
        return $this->DeliveryBoyRepository->update($parms, $DeliveryBoy);
    }

    public function destroy($id)
    {
        return $this->DeliveryBoyRepository->destroy($id);
    }

    public function validatePin(HttpRequest $request)
    {
        $this->validate($request,[
            'pin'=>'required',
         ]);
        return $this->DeliveryBoyRepository->validatePin($request->all());
    }

    public function UpdateStatus(HttpRequest $request)
    {
        $this->validate($request,[
            'id'=>'required|exists:delivery_boys',
            'availability_status' =>'required|in:DEFAULT,0,1'
         ]);

        return $this->DeliveryBoyRepository->UpdateStatus($request->all());
    }
}
