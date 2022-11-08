<?php

namespace Database\Seeders;

use App\Models\Blogs;
use App\Models\Categories;
use Illuminate\Database\Seeder;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blogs::factory()
            ->has(Categories::factory()->count(10))
            ->create();
    }
}
