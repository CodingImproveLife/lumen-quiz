<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class QuestionController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return QuestionResource::collection(Question::paginate(5));
    }

    public function show(int $question): AnonymousResourceCollection
    {
        $question = Question::where('id', $question)->get();
        return QuestionResource::collection($question);
    }
}
