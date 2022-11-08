<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KeywordsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title"=>$this->faker->text(30),
            "content"=>$this->faker->text,
            "image"=>$this->faker->text,
            "slug"=>$this->faker->text,
            "author_id"=>$this->faker->numberBetween(1,3),
            "meta_title"=>$this->faker->text,
            "meta_description"=>$this->faker->text,
            "status"=>$this->faker->numberBetween(0,1),
            "category_id"=>$this->faker->numberBetween(1,8),
        ];
    }
}
