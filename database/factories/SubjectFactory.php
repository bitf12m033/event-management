<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\Classes;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    protected $model = Subject::class;

    public function definition()
    {
        return [
            'subject_name' => $this->faker->word,
            'short_desc' => $this->faker->sentence,
            'long_desc' => $this->faker->paragraph,
            'class_id' => Classes::factory(),
        ];
    }
}