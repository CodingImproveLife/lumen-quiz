<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::factory(20)->create()->each(function ($question) {
            Answer::factory(3)->create([
                'question_id' => $question->id,
            ]);
            Answer::factory(1)->create([
                'is_correct' => true,
                'question_id' => $question->id,
            ]);
        });
    }
}
