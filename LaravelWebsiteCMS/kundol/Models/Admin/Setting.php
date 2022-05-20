<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'value','created_by','updated_by'
    ];

    public static function set($key, $val, $type = '')
    {
        if ($type != '' && $key != '' && $setting = Setting::where('key', $key)->where('type', $type)->first()) {
            return $setting->update(['value' => $val]);
        }
    }

    public function scopeType($query, $type, $key = '')
    {
        if($key != '')
            $query = $query->where('key', $key);
        return $query->where('type', $type);
    }

    public function scopeGallaryHeightWidth($query, $val)
    {
        return $query->where('key', $val)->where('type', 'gallary_setting');
    }

}
