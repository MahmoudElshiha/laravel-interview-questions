<?php

namespace App\Models;

use App\Enums\QuestionDifficultyLevelEnum;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question_category_id', 'question', 'answer', 'difficulty_level'];

    protected $casts = [
        'difficulty_level' => QuestionDifficultyLevelEnum::class,
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(QuestionCategory::class, 'question_category_id');
    }
}
