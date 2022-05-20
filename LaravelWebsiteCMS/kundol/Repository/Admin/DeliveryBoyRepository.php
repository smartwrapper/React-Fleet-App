<?php

namespace App\Repository\Admin;

use App\Contract\Admin\DeliveryBoyInterface;
use App\Http\Resources\Admin\DeliveryBoy as DeliveryBoyResource;
use App\Models\Admin\DeliveryBoy;
use App\Models\Admin\DeliveryBoyDetail;
use App\Models\Admin\Language;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;
use Image;

class DeliveryBoyRepository implements DeliveryBoyInterface
{
    use ApiResponser;
    /**
     * @return Collection
     */
    public function all()
    {
        try {
            $DeliveryBoy = new DeliveryBoy;
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            $sortBy = ['id'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $DeliveryBoy = $DeliveryBoy->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            return $this->successResponse(DeliveryBoyResource::collection($DeliveryBoy->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($DeliveryBoy)
    {
        // return $DeliveryBoy->id;
        $DeliveryBoy = DeliveryBoy::where('id',$DeliveryBoy->id);
        try {
            return $this->successResponse(new DeliveryBoyResource($DeliveryBoy->firstOrFail()), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            // 'avatar',
            // 'driving_license_no',
            // 'vehicle_rc_book_no'
            if($parms['avatar']) {
                $image = $parms['avatar'];
                $name = $image->getClientOriginalName();
                $name = date('Ymdis') . $name;
    
                $destinationPath = public_path('/delivery');
                $img = Image::make($image->path());
    
                $image->move($destinationPath, $name);
                $parms['avatar'] = $name;

                
            }
            if($parms['driving_license_no']) {
                $image = $parms['driving_license_no'];
                $name = $image->getClientOriginalName();
                $name = date('Ymdis') . $name;
    
                $destinationPath = public_path('/delivery');
                $img = Image::make($image->path());
    
                $image->move($destinationPath, $name);
                $parms['driving_license_no'] = $name;
            }
            if($parms['vehicle_rc_book_no']) {
                $image = $parms['vehicle_rc_book_no'];
                $name = $image->getClientOriginalName();
                $name = date('Ymdis') . $name;
    
                $destinationPath = public_path('/delivery');
                $img = Image::make($image->path());
    
                $image->move($destinationPath, $name);
                $parms['vehicle_rc_book_no'] = $name;
            }


            $sql = new DeliveryBoy;
            $sql = $sql->create($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new DeliveryBoyResource($sql), 'DeliveryBoy Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $DeliveryBoy)
    {
        // return gettype($parms['avatar']) ;
        try {
            if($parms['avatar'] && gettype($parms['avatar']) != 'string' ) {
                $image = $parms['avatar'];
                $name = $image->getClientOriginalName();
                $name = date('Ymdis') . $name;
    
                $destinationPath = public_path('/delivery');
                $img = Image::make($image->path());
    
                $image->move($destinationPath, $name);
                $parms['avatar'] = $name;

                
            }
            if($parms['driving_license_no'] && gettype($parms['driving_license_no']) != 'string'  ) {
                $image = $parms['driving_license_no'];
                $name = $image->getClientOriginalName();
                $name = date('Ymdis') . $name;
    
                $destinationPath = public_path('/delivery');
                $img = Image::make($image->path());
    
                $image->move($destinationPath, $name);
                $parms['driving_license_no'] = $name;
            }
            if($parms['vehicle_rc_book_no'] && gettype($parms['vehicle_rc_book_no']) != 'string') {
                $image = $parms['vehicle_rc_book_no'];
                $name = $image->getClientOriginalName();
                $name = date('Ymdis') . $name;
    
                $destinationPath = public_path('/delivery');
                $img = Image::make($image->path());
    
                $image->move($destinationPath, $name);
                $parms['vehicle_rc_book_no'] = $name;
            }
            $DeliveryBoy->update($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($DeliveryBoy) {
            return $this->successResponse(new DeliveryBoyResource($DeliveryBoy), 'DeliveryBoy Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($DeliveryBoy)
    {
        try {
            $sql = DeliveryBoy::findOrFail($DeliveryBoy);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse('', 'DeliveryBoy Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function validatePin(array $parms){
        try {
            $deliveryboy = DeliveryBoy::where('pin_code',$parms['pin'])->first();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($deliveryboy) {
            return $this->successResponse(new DeliveryBoyResource($deliveryboy), 'DeliveryBoy Get Successfully!');
        } else {
            return $this->errorResponse('Invalid Delivery Boy Pin Code');
        }
    }

    public function UpdateStatus(array $parms){
        try {
            $DeliveryBoy = DeliveryBoy::where('id',$parms['id'])->update(['availability_status'=> $parms['availability_status']]);
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($DeliveryBoy) {
            return $this->successResponse(new DeliveryBoyResource(DeliveryBoy::where('id',$parms['id'])->first()), 'DeliveryBoy Status Updated Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
