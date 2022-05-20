<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddressBook extends Model
{
    use HasFactory;

    protected $table = 'customer_address_book';
    public $timestamps = false;
    protected $fillable = [
        'customer_id', 'gender', 'company', 'street_address', 'suburb', 'postcode', 'dob', 'city', 'country_id', 'state_id', 'lattitude', 'longitude', 'is_default', 'phone','first_name','last_name','latlong'
    ];

    public function country()
    {
        return $this->belongsTo('App\Models\Admin\Country', 'country_id', 'id');
    }

    public function ScopeGetCustomerAddress($query, $customerId)
    {
        return $query->where('customer_id', $customerId);
    }

    public function state()
    {
        return $this->belongsTo('App\Models\Admin\State', 'state_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Admin\Customer', 'customer_id', 'id');
    }
}
