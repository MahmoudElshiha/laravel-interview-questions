<?php

use App\Enums\QuestionDifficultyLevelEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\QuestionCategory::class)->constrained()->cascadeOnDelete();
            $table->string('difficulty_level')->default(QuestionDifficultyLevelEnum::Easy->value);
            $table->text('question');
            $table->text('answer');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
