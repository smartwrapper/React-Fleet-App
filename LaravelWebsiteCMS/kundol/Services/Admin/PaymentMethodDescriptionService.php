<?php
namespace App\Services\Admin;

use App\Models\Admin\PaymentMethodDescription;
use App\Traits\ApiResponser;
use DB;

class PaymentMethodDescriptionService
{
    use ApiResponser;
    public function update($parms, $paymentMethodId)
    {
        // update payment method descrption
        foreach ($parms['language_id'] as $index => $language_id) {
            $language_name = $sub_name_1 = $sub_name_2 = '';
            if (isset($parms['language_value'][$index])) {
                $language_name = $parms['language_value'][$index];
            }

            if (isset($parms['sub_name_1'][$index])) {
                $sub_name_1 = $parms['sub_name_1'][$index];
            }

            if (isset($parms['sub_name_2'][$index])) {
                $sub_name_2 = $parms['sub_name_2'][$index];
            }

            try {
                $sql = PaymentMethodDescription::updateOrCreate(
                    ['payment_method_id' => $paymentMethodId, 'language_id' => $language_id],
                    ['name' => $language_name, 'sub_name_1' => $sub_name_1, 'sub_name_2' => $sub_name_2]
                );
            } catch (Exception $e) {
                DB::rollBack();
                return $this->errorResponse('payment method description can not updated due to internal server error!', 422);
            }

        }
        // end update payment method descrption
        return 1;
    }
}
