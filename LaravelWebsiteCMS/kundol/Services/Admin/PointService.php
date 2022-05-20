<?php

namespace App\Services\Admin;

use App\Models\Admin\Customer;
use App\Traits\ApiResponser;
use App\Models\Admin\Setting;
use App\Models\Web\Point;
use App\Models\Admin\Product;

class PointService
{
    use ApiResponser;
    public function customerPoints($parms, $ref_id)
    {
        if (isset($parms['hash']) && $parms['hash'] != '') {
            $id = Customer::hash($parms['hash'])->value('id');
            if ($id) {
                $value = Setting::where('type', 'point_setting')->pluck('value', 'key')->toArray();
                if ($value['point_setting'] == 'enable') {
                    Point::create([
                        'points' => $value['invite_friend_share_point'],
                        'description' => 'Earn Point Against Invite Friend',
                        'type' => 'invite_friend_share_point',
                        'reference_id' => $ref_id,
                        'customer_id' => $id
                    ]);
                }
            }
        }
    }


    public function checkinPoints($ref_id)
    {
        $value = Setting::where('type', 'point_setting')->pluck('value', 'key')->toArray();
        if ($value['point_setting'] == 'enable') {
            $latest = Point::where('type', 'checkin_point')->where('reference_id', $ref_id)->latest()->first();
            if ($latest) {
                $date1 = $latest->created_at;
                $date2 = date('Y-m-d H:i:s');
                $timestamp1 = strtotime($date1);
                $timestamp2 = strtotime($date2);
                $hours =  abs($timestamp2 - $timestamp1) / (60 * 60);
                if ($hours >  $value['checkin_hour']) {
                    Point::create([
                        'points' => $value['checkin_point'],
                        'description' => 'Earn Point Against Login',
                        'type' => 'checkin_point',
                        'reference_id' => $ref_id,
                        'customer_id' => $ref_id,
                    ]);
                }
            } else {
                Point::create([
                    'points' => $value['checkin_point'],
                    'description' => 'Earn Point Against Login',
                    'type' => 'checkin_point',
                    'reference_id' => $ref_id,
                    'customer_id' => $ref_id,
                ]);
            }
        }
    }

    public function orderPoints($products, $productsPoint, $customer_id, $ref_id)
    {
        $value = Setting::where('type', 'point_setting')->pluck('value', 'key')->toArray();
        $sum = 0;
        if ($value['point_setting'] == 'enable') {
            foreach($products as $i => $product){
                if($productsPoint[$i] == '1'){
                    $sum = $sum + $product;
                }
            }
            if($sum > 0){
                $points = $sum / $value['per_order_price_point'];

                Point::create([
                    'points' => round($points),
                    'description' => 'Earn Point Against Order',
                    'type' => 'per_order_point',
                    'reference_id' => $ref_id,
                    'customer_id' => $customer_id,
                ]);
            }
        }
    }

    public function productSharePoints($hash, $ref_id)
    {
        if (isset($hash) && $hash != '') {
            $id = Customer::hash($hash)->value('id');
            if ($id) {
                $value = Setting::where('type', 'point_setting')->pluck('value', 'key')->toArray();
                if ($value['point_setting'] == 'enable') {
                    $latest = Point::where('type', 'product_share_point')->where('reference_id', $ref_id)->first();
                    if (!$latest) {
                        $is_point = Product::productId($ref_id)->value('is_point');
                        if($is_point == '1'){
                            Point::create([
                                'points' => $value['product_share_point'],
                                'description' => 'Earn Point Against Share Product',
                                'type' => 'product_share_point',
                                'reference_id' => $ref_id,
                                'customer_id' => $id
                            ]);
                        }
                    }
                }
            }
        }
    }
    
}
