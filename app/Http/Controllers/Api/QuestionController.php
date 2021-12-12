<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class QuestionController extends Controller
{
    public function show(int $id): AnonymousResourceCollection
    {
        $question = Question::where('id', $id)->with('answers')->get();
        return QuestionResource::collection($question);
    }
}
