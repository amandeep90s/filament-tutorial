<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class NewRegisteredUsersWidget extends TableWidget
{
    protected static ?int $sort = 4;

    protected int|string|array $columnSpan = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(fn(): Builder => User::query()->latest()->take(10))
            ->columns([
                TextColumn::make('id')->sortable()->sortable()->label('Id'),
                TextColumn::make('name')->sortable()->label('Name'),
                TextColumn::make('email')->sortable()->label('Email'),
                TextColumn::make('created_at')->sortable()->dateTime()->label('Registered at'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
