<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuizResource;
use App\Models\Quiz;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class QuizController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return QuizResource::collection(Quiz::paginate(5));
    }

    public function show(int $id): AnonymousResourceCollection
    {
        $quiz = Quiz::where('id', $id)->with('questions', 'questions.answers')->get();
        return QuizResource::collection($quiz);
    }
}
