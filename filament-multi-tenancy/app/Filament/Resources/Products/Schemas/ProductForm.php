<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Category;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('sku')
                    ->label('SKU')
                    ->required(),
                Select::make('category_id')
                    ->options(Category::all()->pluck('name', 'id'))
                    ->required(),
                TextInput::make('price')
                    ->type('number')
                    ->rules(['required'])
                    ->label('Price'),
            ]);
    }
}
