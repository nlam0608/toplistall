<?php

namespace Database\Seeders;

use App\Models\Authors;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author = new Authors();
        $author->name = 'Nguyenlam';
        $author->image = 'ádf';
        $author->information = '123';
        $author->email = 'nlam2001@gmail.com';
        $author->password = Hash::make('lam123');
        $author->status = '1';
        $author->save();
    }
}
