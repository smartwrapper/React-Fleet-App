<?php

namespace App\Models\Web;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'order_status'];
    
    protected $newDateFormat = 'd-m-Y H:i:s';

    public function getUpdatedAtAttribute($value) {
       return Carbon::parse($value)->format($this->newDateFormat);
    }

    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->format($this->newDateFormat);
    }

}
