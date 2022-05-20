<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class BusinessSetting extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'business_setting';
    protected $fillable = [
        'gallary_id', 'timezone_id', 'business_name', 'start_date', 'default_profit_percentage', 'year_start_month', 'accounting_method', 'transaction_edit_days', 'date_format', 'time_format', 'created_by', 'updated_by',
    ];

    public function gallary()
    {
        return $this->belongsTo('App\Models\Admin\Gallary', 'gallary_id', 'id');
    }

 

    public function timezone()
    {
        return $this->belongsTo('App\Models\Admin\Timezone', 'timezone_id', 'id');
    }
}
