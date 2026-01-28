<?php

namespace App\Filament\Resources\QuestionCategories\Pages;

use App\Filament\Resources\QuestionCategories\QuestionCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateQuestionCategory extends CreateRecord
{
    protected static string $resource = QuestionCategoryResource::class;
}
