<?php

namespace Database\Seeders;

use App\Models\Admin\Permission;
use App\Models\Admin\PermissionRole;
use Illuminate\Database\Seeder;

class AssignPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::all();
        
        
        PermissionRole::where('id', '>', '0')->delete();
        if(count($permission) > 0){
            for($i =0 ; $i < count($permission);$i++){
                PermissionRole::insertOrIgnore(
                    [
                        'permission_id' => $permission[$i]->id,
                        'role_id' => 1,
                        'created_by' => 1,
                    ]
                );
            }
           
        }


        
        $permission = Permission::where('id','!=',60)->where('parent_id','!=',60)->get();
        if(count($permission) > 0){
            for($i =0 ; $i < count($permission);$i++){
                PermissionRole::insertOrIgnore(
                    [
                        'permission_id' => $permission[$i]->id,
                        'role_id' => 2,
                        'created_by' => 1,
                    ]
                );
            }
           
        }



        $permission = Permission::whereIn('id',[28,32])->get();
        if(count($permission) > 0){
            for($i =0 ; $i < count($permission);$i++){
                PermissionRole::insertOrIgnore(
                    [
                        'permission_id' => $permission[$i]->id,
                        'role_id' => 3,
                        'created_by' => 1,
                    ]
                );
            }
           
        }



        $permission = Permission::whereIn('id',[26,
        27,25,24])->get();
        if(count($permission) > 0){
            for($i =0 ; $i < count($permission);$i++){
                PermissionRole::insertOrIgnore(
                    [
                        'permission_id' => $permission[$i]->id,
                        'role_id' => 4,
                        'created_by' => 1,
                    ]
                );
            }
           
        }

        


        $permission = Permission::where('id',38)->Orwhere('parent_id',38)->get();
        if(count($permission) > 0){
            for($i =0 ; $i < count($permission);$i++){
                PermissionRole::insertOrIgnore(
                    [
                        'permission_id' => $permission[$i]->id,
                        'role_id' => 5,
                        'created_by' => 1,
                    ]
                );
            }
           
        }



        $permission = Permission::whereIn('id',[5,2,33,26,24,28])->OrwhereIn('parent_id',[5,2,33,26,24,28])->get();
        if(count($permission) > 0){
            for($i =0 ; $i < count($permission);$i++){
                PermissionRole::insertOrIgnore(
                    [
                        'permission_id' => $permission[$i]->id,
                        'role_id' => 6,
                        'created_by' => 1,
                    ]
                );
            }
           
        }



        $permission = Permission::whereIn('id',[5,2])->OrwhereIn('parent_id',[5,2])->get();
        if(count($permission) > 0){
            for($i =0 ; $i < count($permission);$i++){
                PermissionRole::insertOrIgnore(
                    [
                        'permission_id' => $permission[$i]->id,
                        'role_id' => 7,
                        'created_by' => 1,
                    ]
                );
            }
           
        }

        





        



        
    }
}
