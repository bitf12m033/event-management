<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Seeder;

class ClassesSeeder extends Seeder
{
    public function run()
    {
        Classes::factory()->count(10)->create();
    }
}