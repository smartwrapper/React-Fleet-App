<?php
namespace App\Services\Admin;

use App\Models\Admin\PaymentMethodSetting;
use App\Traits\ApiResponser;
use DB;

class PaymentMethodSettingService
{
    use ApiResponser;
    public function Update($parms, $paymentMethod)
    {
        // update payment method setting
        try {
            $setting = PaymentMethodSetting::where('payment_method_id', $paymentMethod->id)->pluck('key')->toArray();
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => 'payment method setting not found!'], 401);
        }

        foreach ($parms['key'] as $index => $key) {
            if (isset($parms['value'][$index]) && in_array($key, $setting)) {
                if($paymentMethod->payment_method == 'paypal' || $paymentMethod->payment_method == 'mollie' || $paymentMethod->payment_method == 'paytm'){
                    $this->changeEnv([
                        $key => str_replace(' ', '_', $parms['value'][$index]),
                    ]);
                }
                try {
                    PaymentMethodSetting::set($key, $parms['value'][$index], $paymentMethod->id);
                } catch (Exception $e) {
                    DB::rollBack();
                    return $this->errorResponse('payment method description can not updated due to internal server error!', 401);
                }
            }

        }
        return 1;
        // end update payment method setting
    }


    protected function changeEnv($data = array())
    {
        if (count($data) > 0) {

            $env = file_get_contents(base_path() . '/.env');

            $env = preg_split('/\s+/', $env);

            foreach ((array) $data as $key => $value) {

                foreach ($env as $env_key => $env_value) {

                    $entry = explode("=", $env_value, 2);

                    if ($entry[0] == $key) {
                        $env[$env_key] = $key . "=" . $value;
                    } else {
                        $env[$env_key] = $env_value;
                    }
                }
            }

            $env = implode("\n", $env);

            file_put_contents(base_path() . '/.env', $env);

            return true;
        } else {
            return false;
        }
    }
}
