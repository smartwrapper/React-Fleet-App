<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Admin\Product;
use App\Models\Admin\Brand;


class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'created_by' => User::factory(),
            'gallary_id' => 1,
            'price' => rand(15, 100),
            'product_unit' => 1,
            'product_slug' => str_replace(" ", "-",  $this->faker->name),
            'product_weight' => '10kg',
            'product_status' => 'active',
            'brand_id' => Brand::factory(),
            'tax_id' => 1,
            'product_min_order' => 1,
            'product_max_order' => 10,
        ];
    }
    
}
