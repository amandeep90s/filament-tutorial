<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class PostForm
{
    public static function configure(Schema $schema, bool $hideCategory = false): Schema
    {
        return $schema
            ->components([
                Section::make('Fields')
                    ->description('Fill all the * fields')
                    ->icon(Heroicon::RocketLaunch)
                    ->schema([
                        Group::make()
                            ->schema([
                                TextInput::make('title')
                                    ->rules(['required', 'min:3', 'max:255']),
                                TextInput::make('slug')
                                    ->rules(['required'])
                                    ->unique()
                                    ->validationMessages(['unique' => 'The slug must be unique.']),
                                Select::make('category_id')
                                    ->label('Category')
                                    ->relationship('category', 'name')
                                    ->searchable()
                                    ->rules(['required'])
                                    ->hidden($hideCategory),
                                ColorPicker::make('color')
                                    ->rules(['required']),
                            ])->columns(2),
                        MarkdownEditor::make('body')
                            ->rules(['required']),
                    ])
                    ->columnSpan(2),
                Group::make()
                    ->schema([
                        Section::make('Image Upload')
                            ->schema([
                                FileUpload::make('image')
                                    ->disk('public')
                                    ->directory('posts')
                                    ->image(),
                            ]),
                        Section::make('Meta Info')
                            ->schema([
                                Select::make('tags')
                                    ->relationship('tags', 'name')
                                    ->multiple(),
                                Toggle::make('is_published')->label('Published'),
                                DatePicker::make('published_at')->label('Published At'),
                            ]),
                    ])->columnSpan(1),
            ])->columns(3);
    }
}
