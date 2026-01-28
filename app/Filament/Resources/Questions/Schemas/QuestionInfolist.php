<?php

namespace App\Filament\Resources\Questions\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class QuestionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make(__('filament.question_details'))
                    ->columnSpanFull()
                    ->schema([

                        TextEntry::make('difficulty_level')
                            ->label(__('filament.difficulty_level')),
                        TextEntry::make('category.name')
                            ->label(__('filament.category')),
                        TextEntry::make('question')
                            ->label(__('filament.question_text'))
                            ->columnSpanFull(),
                        TextEntry::make('answer')
                            ->label(__('filament.answer'))
                            ->columnSpanFull(),
                        TextEntry::make('created_at')
                            ->label(__('filament.created_at'))
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('updated_at')
                            ->label(__('filament.updated_at'))
                            ->dateTime()
                            ->placeholder('-'),
                    ]),
            ]);
    }
}
