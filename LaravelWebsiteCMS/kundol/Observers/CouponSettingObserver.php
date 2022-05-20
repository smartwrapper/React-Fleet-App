<?php

namespace App\Observers;

use App\Models\Admin\CouponSetting;
use Auth;
use Log;

class CouponSettingObserver
{
    public function __construct()
    {
        $this->logText = 'User ID ' . Auth::id();
    }
    /**
     * Handle the CouponSetting "created" event.
     *
     * @param  \App\Models\Admin\CouponSetting  $couponSetting
     * @return void
     */
    public function created(CouponSetting $couponSetting)
    {
        $couponSetting->created_by = Auth::id();
        $couponSetting->unsetEventDispatcher();
        $couponSetting->save();
        Log::info($this->logText . ' created a new coupon code: ' . $couponSetting);
    }

    /**
     * Handle the CouponSetting "updated" event.
     *
     * @param  \App\Models\Admin\CouponSetting  $couponSetting
     * @return void
     */
    public function updated(CouponSetting $couponSetting)
    {
        $couponSetting->updated_by = Auth::id();
        $couponSetting->unsetEventDispatcher();
        $couponSetting->save();
        Log::info($this->logText . ' updated a coupon code: ' . $couponSetting);
    }

    /**
     * Handle the CouponSetting "deleted" event.
     *
     * @param  \App\Models\Admin\CouponSetting  $couponSetting
     * @return void
     */
    public function deleted(CouponSetting $couponSetting)
    {
        $couponSetting->updated_by = Auth::id();
        $couponSetting->unsetEventDispatcher();
        $couponSetting->save();
        Log::info($this->logText . ' deleted a coupon code: ' . $couponSetting);
    }
}
