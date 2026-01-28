<?php

namespace App\Filament\Resources\Questions\Tables;

use App\Enums\QuestionDifficultyLevelEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\ExportAction;
use pxlrbt\FilamentExcel\Actions\ExportBulkAction;

class QuestionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category.name')
                    ->label(__('filament.category'))
                    ->searchable(),
                TextColumn::make('difficulty_level')
                    ->label(__('filament.difficulty_level'))
                    ->badge()
                    ->color(fn (QuestionDifficultyLevelEnum $state): string => match ($state) {
                        QuestionDifficultyLevelEnum::Easy => 'success',
                        QuestionDifficultyLevelEnum::Medium => 'warning',
                        QuestionDifficultyLevelEnum::Hard => 'danger',
                    })
                    ->searchable(),
                TextColumn::make('question')
                    ->label(__('filament.question_text'))
                    ->limit(50)
                    ->searchable(),
                TextColumn::make('answer')
                    ->label(__('filament.answer'))
                    ->limit(50)
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label(__('filament.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('filament.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('difficulty_level')
                    ->label(__('filament.difficulty'))
                    ->options(QuestionDifficultyLevelEnum::class),
                SelectFilter::make('category')
                    ->label(__('filament.category'))
                    ->relationship('category', 'name'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->headerActions([
                ExportAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    ExportBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
