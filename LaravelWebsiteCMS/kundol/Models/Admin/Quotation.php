<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quotation extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = [
        'biller_id', 'purchaser_id', 'customer_id', 'warehouse_id', 'tax_id', 'gallary_id', 'discount_amount', 'status', 'shipping_cost', 'tax_amount', 'grand_total', 'note', 'created_by', 'updated_by','type','uuid'
    ];

    public function scopeGetProductDetailByLanguageId($query, $languageId)
    {
        return $query->with(['quotation_detail.product.detail' => function ($q) use ($languageId) {
            $q->where('language_id', $languageId);
        }]);
    }

    public function scopeType($query, $type)
    {
        return $query->where('type',$type);
    }

    public function biller()
    {
        return $this->belongsTo('App\Models\Admin\Biller', 'biller_id');
    }

    public function purchaser()
    {
        return $this->belongsTo('App\Models\Admin\Purchaser', 'purchaser_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Admin\Customer', 'customer_id');
    }

    public function warehouse()
    {
        return $this->belongsTo('App\Models\Admin\Warehouse', 'warehouse_id');
    }

    public function tax()
    {
        return $this->belongsTo('App\Models\Admin\Tax', 'tax_id');
    }

    public function gallary()
    {
        return $this->belongsTo('App\Models\Admin\Gallary', 'gallary_id');
    }

    public function quotation_detail()
    {
        return $this->hasMany('App\Models\Admin\QuotationDetail');
    }
}
