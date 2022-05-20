<?php
namespace Database\Seeders;

use App\Models\Admin\Country;
use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        Country::where('id', '>', '0')->delete();
        $file = fopen(public_path("country.csv"), "r");
        while ( ($data = fgetcsv($file,0,",")) !== FALSE )
            {
                Country::insertOrIgnore(
                    [
                        'id' => $data[0],
                        'name' => $data[1],
                        'iso_code_2' => $data[2],
                        'iso_code_3' => $data[3],
                        'address_format_id' => $data[4],
                        'country_code' => $data[5],
                    ],
                    
                );
                
            }
        fclose($file);
       

    }
}
