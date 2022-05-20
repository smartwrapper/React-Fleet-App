<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\PaymentMethodInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\PaymentMethodDescriptionRequest;
use App\Http\Requests\PaymentMethodRequest;
use App\Http\Requests\PaymentMethodSettingRequest;
use App\Models\Admin\PaymentMethod;
use App\Repository\Admin\PaymentMethodRepository;

class PaymentMethodController extends Controller
{
    private $PaymentMethodRepository;

    public function __construct(PaymentMethodInterface $PaymentMethodRepository)
    {
        $this->PaymentMethodRepository = $PaymentMethodRepository;
    }

    public function index()
    {
        return $this->PaymentMethodRepository->all();
    }

    public function show(PaymentMethod $paymentMethod)
    {
        return $this->PaymentMethodRepository->show($paymentMethod);
    }

    public function update(PaymentMethodRequest $request, PaymentMethod $PaymentMethod)
    {
        if (isset($_GET['updateSetting']) && $_GET['updateSetting'] == '1') {
            $paymentMethodSettingRequest = new PaymentMethodSettingRequest;
            $this->validate($request, $paymentMethodSettingRequest->rules());
        }

        if (isset($_GET['updateDescription']) && $_GET['updateDescription'] == '1') {
            $paymentMethodDescriptionRequest = new PaymentMethodDescriptionRequest;
            $this->validate($request, $paymentMethodDescriptionRequest->rules());
        }
        $parms = $request->all();
        return $this->PaymentMethodRepository->update($parms, $PaymentMethod);
    }

}
