<?php

namespace Database\Seeders;

use App\Models\Web\Wishlist;
use Illuminate\Database\Seeder;

class WishlistSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        Wishlist::where('id', '>', '0')->delete();
        
    }
}
