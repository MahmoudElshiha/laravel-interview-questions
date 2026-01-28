<?php

namespace App\Filament\Resources\QuestionCategories\Pages;

use App\Filament\Resources\QuestionCategories\QuestionCategoryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewQuestionCategory extends ViewRecord
{
    protected static string $resource = QuestionCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
