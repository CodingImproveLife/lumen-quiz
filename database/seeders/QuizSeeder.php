<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quiz::factory(20)->create()->each(function ($quiz) {
            Question::factory(5)->create([
                'quiz_id' => $quiz->id,
            ])->each(function ($question) {
                Answer::factory(3)->create([
                    'question_id' => $question->id,
                ]);
                Answer::factory(1)->create([
                    'is_correct' => true,
                    'question_id' => $question->id,
                ]);
            });
        });
    }
}
