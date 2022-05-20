<?php
namespace App\Services\Admin;

use App\Models\Admin\ShippingMethodDescription;
use DB;

class ShippingMethodDescriptionService
{
    public function update($parms, $shippingMethodId)
    {
        // update payment method descrption
        foreach ($parms['language_id'] as $index => $language_id) {
            $language_name = '';
            if (isset($parms['language_value'][$index])) {
                $language_name = $parms['language_value'][$index];
            }

            try {
                ShippingMethodDescription::updateOrCreate(
                    ['shipping_method_id' => $shippingMethodId, 'language_id' => $language_id],
                    ['name' => $language_name]
                );
            } catch (Exception $e) {
                DB::rollBack();
                return response()->json(['status' => 'error', 'msg' => 'payment method description can not updated due to internal server error!'], 401);
            }

        }
        // end update payment method descrption
        return 1;
    }
}
