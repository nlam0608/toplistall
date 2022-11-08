<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title"=>$this->faker->name,
            "content"=>$this->faker->text,
            "short_description"=>$this->faker->text,
            "subcontent"=>$this->faker->text,
            "image"=>$this->faker->text,
            "category_id"=>$this->faker->numberBetween(1, 9),
            "status"=>$this->faker->numberBetween(0,1),
            "slug"=>$this->faker->text,
        ];
    }
}
