<?php

namespace App\Filament\Manager\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID'),
                TextColumn::make('name')->label('Name'),
                TextColumn::make('email')->label('Email'),
                TextColumn::make('role')->label('Role')->formatStateUsing(fn($state) => strtoupper($state)),
                TextColumn::make('created_at')->label('Creation Date')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->modifyQueryUsing(fn($query) => $query->whereIn('role', ['manager', 'user']))
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
