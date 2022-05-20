<?php
namespace Database\Seeders;

use App\Models\Admin\SliderType;
use Illuminate\Database\Seeder;

class SliderTypeSeeder extends Seeder
{
    public function run()
    {

        SliderType::where('id', '>', '0')->delete();
        SliderType::insertOrIgnore([
            ['name' => 'Full Screen Slider (1600x420)'],
            ['name' => 'Full Page Slider (1170x420)'],
            ['name' => 'Right Slider with Thumbs (770x400)'],
            ['name' => 'Right Slider with Navigation (770x400)'],
            ['name' => 'Left Slider with Thumbs (770x400)'],
        ]);

    }
}
