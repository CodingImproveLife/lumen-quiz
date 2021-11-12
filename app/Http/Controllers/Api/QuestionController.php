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

    public function show(int $id): AnonymousResourceCollection
    {
        $question = Question::where('id', $id)->get();
        return QuestionResource::collection($question);
    }
}
