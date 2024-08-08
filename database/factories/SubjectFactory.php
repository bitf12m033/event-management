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
            'class_id' => Classes::factory(),
        ];
    }
}