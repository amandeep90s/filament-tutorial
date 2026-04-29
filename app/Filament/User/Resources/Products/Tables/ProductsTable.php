<?php

namespace App\Filament\User\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->disk('public')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('id')->label('ID')->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('name')->label('Name')->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('sku')->label('SKU')->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('price')->label('Price')->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('stock')->label('Stock')->toggleable(isToggledHiddenByDefault: false),
            ])
            ->filters([
                //
            ])
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
