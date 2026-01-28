<?php

namespace App\Filament\Resources\Questions\Schemas;

use App\Enums\QuestionDifficultyLevelEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class QuestionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('difficulty_level')
                    ->label(__('filament.difficulty_level'))
                    ->options(QuestionDifficultyLevelEnum::class)
                    ->required(),
                Select::make('question_category_id')
                    ->label(__('filament.category'))
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Textarea::make('question')
                    ->label(__('filament.question_text'))
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('answer')
                    ->label(__('filament.answer'))
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
