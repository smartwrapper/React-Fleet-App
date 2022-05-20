<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Admin\BlogCategory;
use App\Models\Admin\BlogCategoryDetail;
class BlogCategoryDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogCategoryDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'blog_category_id' => BlogCategory::factory(),
            'language_id' =>1
        ];
    }
    
}
