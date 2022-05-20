<?php

namespace App\Repository\Admin;

use App\Contract\Admin\MembershipInterface;
use App\Http\Resources\Admin\Membership as MembershipResource;
use App\Models\Admin\Membership;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;
use DB;
class MembershipRepository implements MembershipInterface
{
    use ApiResponser;
    public function all()
    {
        try {
            return $this->successResponse(MembershipResource::collection(Membership::all()) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        DB::beginTransaction();
        try {
            Membership::whereRaw(1)->delete();
            foreach($parms['start_value'] as $k => $start_value){
                $data['start_value'] = $start_value;
                $data['end_value'] = $parms['end_value'][$k];
                $data['display_text'] = $parms['display_text'][$k];
                $sql = new Membership;
                $sql = $sql->create($data);
            }
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }

        if ($sql) {
            DB::commit();
            return $this->successResponse(MembershipResource::collection(Membership::all()), 'Membership Save Successfully!');
        } else {
            DB::rollback();
            return $this->errorResponse();
        }
    }
}
