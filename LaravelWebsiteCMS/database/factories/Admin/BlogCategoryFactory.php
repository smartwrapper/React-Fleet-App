<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Admin\BlogCategory;
class BlogCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogCategory::class;

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
            'status' => 'active',
            'blog_category_slug' =>str_replace(" ", "-",  $this->faker->name)
        ];
    }
    
}
