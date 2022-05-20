<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Admin\Product;
use App\Models\Admin\ProductDetail;
use App\Models\Admin\Brand;


class ProductDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::factory(),
            'title' => $this->faker->name,
            'desc' => $this->faker->name,
            'language_id' => 1,
        ];
    }
    
}
