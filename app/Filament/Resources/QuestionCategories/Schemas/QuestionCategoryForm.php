<?php

namespace App\Filament\Resources\QuestionCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class QuestionCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
            ]);
    }
}
