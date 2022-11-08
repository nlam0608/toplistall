<?php

namespace Database\Seeders;

use App\Models\Keywords;
use App\Models\Products;
use Illuminate\Database\Seeder;

class KeywordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Keywords::factory()
                ->has(Products::factory()->count(10))
                ->create();
    }
}
