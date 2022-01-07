<?php

namespace App\Http\Resources;

use App\Models\Answer;
use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'category' => $this->category->only('id', 'name'),
            'questions' => $this->questions->pluck('id'),
        ];
    }
}
