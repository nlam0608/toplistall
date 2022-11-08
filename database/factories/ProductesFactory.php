<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductesFactory extends Factory
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
            "rating"=>$this->faker->numberBetween(1,5),
            "price"=>$this->faker->numberBetween(500,1000),
            "status"=>$this->faker->numberBetween(0,1),
            "views"=>$this->faker->numberBetween(2000,4000),
            "order"=>$this->faker->numberBetween(1,10),
            "category_id"=>$this->faker->numberBetween(1,5),
            "link_amazon"=>$this->faker->text,
            "link_ebay"=>$this->faker->text,
            "link_walmarl"=>$this->faker->text,
        ];
    }
}
