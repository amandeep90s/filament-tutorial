<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Wizard::make([
                Step::make('Product Infomation')
                    ->icon(Heroicon::InformationCircle)
                    ->description('Fill all the fields')
                    ->schema([
                        Group::make([
                            TextInput::make('name')
                                ->rules(['required', 'min:3', 'max:100'])
                                ->label('Product Name'),
                            TextInput::make('sku')
                                ->rules(['required', 'min:3', 'max:100'])
                                ->unique()
                                ->label('SKU'),
                        ])->columns(2),
                        MarkdownEditor::make('description')
                            ->rules(['required', 'min:10'])
                            ->label('Description'),
                    ]),
                Step::make('Pricing & Stock')
                    ->icon(Heroicon::CurrencyDollar)
                    ->description('Fill price and stocks')
                    ->schema([
                        Group::make([
                            TextInput::make('price')
                                ->type('number')
                                ->rules(['required'])
                                ->label('Price'),
                            TextInput::make('stock')
                                ->type('number')
                                ->rules(['required'])
                                ->label('Stock'),
                        ])->columns(2),
                    ]),
                Step::make('Media & Status')
                    ->icon(Heroicon::Photo)
                    ->description('Fill media and status')
                    ->schema([
                        FileUpload::make('image')
                            ->disk('public')
                            ->directory('products')
                            ->rules(['required', 'image'])
                            ->label('Product Image')
                            ->columnSpanFull(),
                        Group::make([
                            Toggle::make('is_active')->label('Is Active?'),
                            Toggle::make('is_featured')->label('Is Featured?'),
                        ])->columns(2),
                    ]),
            ])
                ->columnSpanFull()
                ->skippable()
                ->submitAction(Action::make('save')
                    ->label('Save Product')
                    ->button()
                    ->color('primary')
                    ->submit('save'))
        ]);
    }
}
