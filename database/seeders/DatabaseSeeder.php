<?php

namespace Database\Seeders;

use App\Models\Blogs;
use App\Models\Keywords;
use App\Models\Products;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this::call(Products::class);
        $this::call(Blogs::class);
        $this::call(Keywords::class);
    }
}
