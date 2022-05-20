<?php

namespace App\Repository\Admin;

use App\Contract\Admin\SettingInterface;
use App\Http\Resources\Admin\Setting as SettingResource;
use App\Models\Admin\Currency;
use App\Models\Admin\Language;
use App\Models\Admin\Setting;
use App\Traits\ApiResponser;
use Auth;
use DB;
use Illuminate\Support\Collection;

class SettingRepository implements SettingInterface
{
    use ApiResponser;
    public function all()
    {
        try {
            if (isset($_GET['app_setting'])) {
                $setting = Setting::where('type', 'app_general')->get();
                $language = Language::where('is_default', 1)->first();
                $currency = Currency::where('is_default', 1)->first();
                // return $currency;

                $setting[] = (object) [
                    'key' => 'language_id',
                    'value' => (string) $language->id,
                    'type' => 'app_general',
                ];

                $setting[] = (object) [
                    'key' => 'language_code',
                    'value' => $language->code,
                    'type' => 'app_general',
                ];
                $setting[] = (object) [
                    'key' => 'direction',
                    'value' => (string) $language->direction,
                    'type' => 'app_general',
                ];
                $setting[] = (object) [
                    'key' => 'currency_id',
                    'value' => (string) $currency->id,
                    'type' => 'app_general',
                ];
                $setting[] = (object) [
                    'key' => 'currency_code',
                    'value' => (string) $currency->title,
                    'type' => 'app_general',
                ];

                $setting[] = (object) [
                    'key' => 'currency_pos',
                    'value' => (string) $currency->symbol_position,
                    'type' => 'app_general',
                ];

                $setting[] = (object) [
                    'key' => 'currency_symbol',
                    'value' => (string) $currency->code,
                    'type' => 'app_general',
                ];

                $setting[] = (object) [
                    'key' => 'currency_decimals',
                    'value' => (string) $currency->decimal_place,
                    'type' => 'app_general',
                ];
            } 
            else if (isset($_GET['type'])) {
                Setting::where('type', $_GET['type'])->firstOrFail();
                $setting = Setting::where('type', $_GET['type'])->get();
            } else {
                $setting = Setting::all();
            }

            return $this->successResponse(SettingResource::collection($setting), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $type)
    {
        try {
            $setting = Setting::where('type', $type)->pluck('key')->toArray();
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        try {
            $sql = 0;
            foreach ($parms['key'] as $index => $key) {
                if (isset($parms['value'][$index]) && in_array($key, $setting)) {
                    if ($type == 'gallary_setting') {
                        $parms['value'][$index] = round($parms['value'][$index]);
                    }
                    $sql = Setting::set($key, $parms['value'][$index], $type);
                }
            }
            if ($type == 'email_smtp') {
                $setting = Setting::where('type', $type)->pluck('value', 'key');
                $this->changeEnv([
                    'MAIL_DRIVER' => str_replace(' ', '_', $setting['mail_engine']),
                    'MAIL_HOST' => str_replace(' ', '_', $setting['smtp_host']),
                    'MAIL_PORT' => str_replace(' ', '_', $setting['smtp_port']),
                    'MAIL_ENCRYPTION' => str_replace(' ', '_', $setting['smtp_encription']),
                    'MAIL_USERNAME' => str_replace(' ', '_', $setting['smtp_username']),
                    'MAIL_PASSWORD' => str_replace(' ', '_', $setting['smtp_password']),
                    'MAIL_FROM_ADDRESS' => str_replace(' ', '_', $setting['smtp_from_email']),
                    'MAIL_FROM_NAME' => str_replace(' ', '_', $setting['smtp_from_name']),
                ]);
            } else if ($type == 'login_credential') {
                $setting = Setting::where('type', $type)->pluck('value', 'key');
                $this->changeEnv([
                    'FACEBOOK_CLIENT_ID' => str_replace(' ', '_', $setting['facebook_client_id']),
                    'FACEBOOK_CLIENT_SECRET' => str_replace(' ', '_', $setting['facebook_client_secret']),
                    'FACEBOOK_REDIRECT' => str_replace(' ', '_', $setting['facebook_redirect']),
                    'GOOGLE_CLIENT_ID' => str_replace(' ', '_', $setting['google_client_id']),
                    'GOOGLE_CLIENT_SECRET' => str_replace(' ', '_', $setting['google_client_secret']),
                    'GOOGLE_REDIRECT' => str_replace(' ', '_', $setting['google_redirect']),
                ]);
            }
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }

        if ($sql) {
            DB::commit();
            return $this->successResponse('', 'Setting Update Successfully!');
        } else {
            DB::rollback();
            return $this->errorResponse();
        }
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
