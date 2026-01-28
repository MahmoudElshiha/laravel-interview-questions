<?php

namespace App\Filament\Resources\Questions\Pages;

use App\Filament\Resources\Questions\QuestionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditQuestion extends EditRecord
{
    protected static string $resource = QuestionResource::class;

    protected function getHeaderActions(): array
    {
        $actions = [
            \Filament\Actions\Action::make('previous')
                ->label(__('Previous'))
                ->icon('heroicon-o-chevron-left')
                ->url(fn (\App\Models\Question $record) => \App\Filament\Resources\Questions\QuestionResource::getUrl('edit', ['record' => \App\Models\Question::where('id', '<', $record->id)->latest('id')->first()]))
                ->hidden(fn (\App\Models\Question $record) => !\App\Models\Question::where('id', '<', $record->id)->exists()),

            \Filament\Actions\Action::make('next')
                ->label(__('Next'))
                ->icon('heroicon-o-chevron-right')
                ->url(fn (\App\Models\Question $record) => \App\Filament\Resources\Questions\QuestionResource::getUrl('edit', ['record' => \App\Models\Question::where('id', '>', $record->id)->oldest('id')->first()]))
                ->hidden(fn (\App\Models\Question $record) => !\App\Models\Question::where('id', '>', $record->id)->exists()),
        ];

        if (app()->getLocale() === 'ar') {
            $actions = array_reverse($actions);
        }

        return [
            ...$actions,
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
