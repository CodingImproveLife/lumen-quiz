<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AnswerController extends Controller
{
    public function check(Request $request)
    {
        try {
            $id = $this->validate($request, [
                'id' => 'bail|required|numeric|integer|min:1',
            ]);
            $answer = Answer::findOrFail($id);
            return response()->json((bool)$answer[0]->is_correct);

        } catch (ValidationException $exception) {
            return response()->json([
                'error' => $exception->errors(),
            ], 422);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'error' => 'Answer not found.',
            ], 404);
        }
    }
}
