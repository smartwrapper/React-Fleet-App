<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Admin\Brand;
class BrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brand::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_by' => User::factory(),
            'gallary_id' => 1,
            'name' => $this->faker->company,
            'brand_slug' =>str_replace(" ", "-",  $this->faker->company),
            'status' => 'active'
        ];
    }
    
}
