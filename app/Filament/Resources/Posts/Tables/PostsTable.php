<?php

namespace App\Filament\Resources\Posts\Tables;

use App\Models\Post;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ReplicateAction;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('image')->disk('public')->toggleable(),
                TextColumn::make('title')->sortable()->searchable()->toggleable(),
                TextColumn::make('slug')->sortable()->searchable()->toggleable(),
                TextColumn::make('category.name')->label('Category')->sortable()->searchable()->toggleable(),
                ColorColumn::make('color')->label('Color')->toggleable(),
                TextColumn::make('created_at')->label('Created At')->dateTime()->sortable()->toggleable(),
                TextColumn::make('tags')->label('Tags')->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('is_published')->label('Published')->toggleable(isToggledHiddenByDefault: true),
            ])->defaultSort('title', 'asc')
            ->filters([
                Filter::make('created_at')
                    ->label('Creation Date')
                    ->schema([
                        DatePicker::make('created_at')
                            ->label('Select Date')
                    ])
                    ->query(function ($query, $data) {
                        return $query->when($data['created_at'], function ($q, $date) {
                            return $q->whereDate('created_at', $date);
                        });
                    }),
                SelectFilter::make('category_id')
                    ->label('Select Category')
                    ->relationship('category', 'name')
                    ->preload()
            ])
            ->recordActions([
                Action::make("Status")
                    ->label("Change Status")
                    ->icon(Heroicon::ClipboardDocumentCheck)
                    ->schema([
                        Checkbox::make('is_published')
                    ])
                    ->fillForm(fn (Post $record) => [
                        'is_published' => $record->is_published,
                    ])
                    ->action(function (array $data, Post $record) {
                        $record->is_published = $data['is_published'];
                        $record->save();
                    })
                ,
                ReplicateAction::make()
                    ->beforeReplicaSaved(function ($replica) {
                        $replica->slug = $replica->slug . '-copy-' . now()->timestamp;
                    }),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
