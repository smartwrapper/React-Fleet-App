<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class StockTransferDetail extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'stock_transfer_detail';
    public $timestamps = false;

    protected $fillable = [
        'stock_transfer_id', 'product_id', 'product_combination_id', 'qty',
    ];

    public function stick_transfer()
    {
        return $this->belongsTo(StockTransfer::class, 'stock_transfer_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function product_combination()
    {
        return $this->belongsTo(ProductCombination::class, 'product_combination_id');
    }
}
