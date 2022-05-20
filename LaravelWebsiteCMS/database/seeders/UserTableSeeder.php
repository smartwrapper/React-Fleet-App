<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Laravel\Passport\Client;
use Laravel\Passport\ClientRepository;
use Laravel\Passport\Database\Factories\ClientFactory;
use DB;
class UserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        User::where('id', '>', '0')->delete();
        User::insertOrIgnore([
            'name' => 'owner',
            'first_name' => 'owner',
            'last_name' => 'owner',
            'email' => 'owner@email.com',
            'password' => \Hash::make('123'),
            'role_id' => '1',
            'status' => 'active',
            'is_seen' => '1',
        ]);

        User::insertOrIgnore([
            'name' => 'Admin',
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => \Hash::make('123'),
            'role_id' => '2',
            'status' => 'active',
            'is_seen' => '1',
        ]);


        User::insertOrIgnore([
            'name' => 'Biller 1',
            'first_name' => 'Biller',
            'last_name' => '1',
            'email' => 'biller1@email.com',
            'password' => \Hash::make('123'),
            'role_id' => '3',
            'status' => 'active',
            'is_seen' => '1',
        ]);


        User::insertOrIgnore([
            'name' => 'Biller 2',
            'first_name' => 'Biller',
            'last_name' => '2',
            'email' => 'biller2@email.com',
            'password' => \Hash::make('123'),
            'role_id' => '3',
            'status' => 'active',
            'is_seen' => '1',
        ]);


        User::insertOrIgnore([
            'name' => 'Purchaser',
            'first_name' => 'Purchaser ',
            'last_name' => 'Purchaser ',
            'email' => 'purchaser@email.com',
            'password' => \Hash::make('123'),
            'role_id' => '4',
            'status' => 'active',
            'is_seen' => '1',
        ]);

        User::insertOrIgnore([
            'name' => 'Accountant ',
            'first_name' => 'Accountant ',
            'last_name' => 'Accountant  ',
            'email' => 'accountant@email.com',
            'password' => \Hash::make('123'),
            'role_id' => '5',
            'status' => 'active',
            'is_seen' => '1',
        ]);



        User::insertOrIgnore([
            'name' => 'Store Manager ',
            'first_name' => 'Store',
            'last_name' => 'Manager',
            'email' => 'manager@email.com',
            'password' => \Hash::make('123'),
            'role_id' => '6',
            'status' => 'active',
            'is_seen' => '1',
        ]);


        User::insertOrIgnore([
            'name' => 'Data Entry',
            'first_name' => 'Data',
            'last_name' => 'Entry',
            'email' => 'dataentry@email.com',
            'password' => \Hash::make('123'),
            'role_id' => '7',
            'status' => 'active',
            'is_seen' => '1',
        ]);

        DB::table('oauth_clients')->insert([
            'user_id' => null,
            'name' => 'Personal Access Client',
            'secret' => 'oyMe9OSFrJ32gSzfVkiRmmjxHTr45uqinfcZe67h',
            'provider' => NULL,
            'redirect' => env('APP_URL'),
            'personal_access_client' => 1,
            'password_client' => 0,
            'revoked' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('oauth_clients')->insert([
            'user_id' => null,
            'name' => 'Personal Access Client',
            'secret' => 'Gjje2fZBOGPJ3Xr7iL8HZdoheI5ZluwQsM6OzSsR',
            'provider' => NULL,
            'redirect' => env('APP_URL'),
            'personal_access_client' => 1,
            'password_client' => 0,
            'revoked' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('oauth_personal_access_clients')->insert([
            'client_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        
        ClientFactory::new()->asPasswordClient()->create(['user_id' => null]);
        
    }
}
