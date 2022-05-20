<?php

namespace App\Repository\Admin;

use App\Contract\Admin\PaymentMethodInterface;
use App\Http\Resources\Admin\PaymentMethod as PaymentMethodResource;
use App\Models\Admin\Language;
use App\Models\Admin\PaymentMethod;
use App\Services\Admin\PaymentMethodDescriptionService;
use App\Services\Admin\PaymentMethodSettingService;
use App\Traits\ApiResponser;
use DB;
use Illuminate\Support\Collection;

class PaymentMethodRepository implements PaymentMethodInterface
{
    use ApiResponser;

    public function all()
    {
        try {
            $paymentMethod = new PaymentMethod;
            if (isset($_GET['getPaymentMethodSetting']) && $_GET['getPaymentMethodSetting'] == '1') {
                $paymentMethod = $paymentMethod->with('payment_setting');
            }
            if (isset($_GET['getPaymentMethodDescription']) && $_GET['getPaymentMethodDescription'] == '1') {
                $languageId = Language::defaultLanguage()->value('id');
                if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                    $language = Language::languageId($_GET['language_id'])->firstOrFail();
                    $languageId = $language->id;
                }
                $paymentMethod = $paymentMethod->getPaymentDetailByLanguageId($languageId);
            }

            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $paymentMethod = $paymentMethod->searchParameter($_GET['searchParameter']);
            }

            return $this->successResponse(PaymentMethodResource::collection($paymentMethod->paginate($numOfResult)) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($paymentMethod)
    {
        try {
            $paymentMethod = PaymentMethod::paymentMethodId($paymentMethod->id);
            if (isset($_GET['getPaymentMethodSetting']) && $_GET['getPaymentMethodSetting'] == '1') {
                $paymentMethod = $paymentMethod->with('payment_setting');
            }
            if (isset($_GET['getPaymentMethodDescription']) && $_GET['getPaymentMethodDescription'] == '1') {
                $paymentMethod = $paymentMethod->with('payment_description');
            }

            return $this->successResponse(new PaymentMethodResource($paymentMethod->firstOrFail()) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $paymentMethod)
    {
        // return $parms;
        DB::beginTransaction();
        try {
            // if(isset($parms['default']) && $parms['default'] == '1'){
            //     PaymentMethod::where('default', '1')->update([
            //         'default' => '0'
            //     ]);
            // }
            // if(isset($parms['status']) && $parms['status'] == '1'){
            //     PaymentMethod::where('status', '1')->update([
            //         'status' => '0'
            //     ]);
            // }

            $sql = $paymentMethod->update($parms);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse();
        }

        if (isset($_GET['updateSetting']) && $_GET['updateSetting'] == '1') {
            $paymentMethodSettingService = new PaymentMethodSettingService;
            $sql = $paymentMethodSettingService->update($parms, $paymentMethod);
        }

        if (isset($_GET['updateDescription']) && $_GET['updateDescription'] == '1') {
            $paymentMethodDescriptionService = new PaymentMethodDescriptionService;
            $sql = $paymentMethodDescriptionService->update($parms, $paymentMethod->id);
        }

        if ($sql) {
            DB::commit();
            return $this->successResponse(new PaymentMethodResource($paymentMethod), 'Payment Method Update Successfully!');
        } else {
            DB::rollback();
            return $this->errorResponse();
        }
    }
}
