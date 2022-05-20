<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Admin\Category;
use App\Models\Admin\CategoryDetail;
class CategoryDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_name' => $this->faker->name,
            'description' =>$this->faker->text,
            'category_id' => Category::factory(),
            'language_id' =>1
        ];
    }
    
}
