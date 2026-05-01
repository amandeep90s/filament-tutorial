<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Http;

class ApiUsers extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $title = 'Api Users';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Users;
    protected string $view = 'filament.pages.api-users';

    public function table(Table $table): Table
    {
        return $table
            ->records(fn() => $this->apiData())
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name'),
                TextColumn::make('username'),
                TextColumn::make('email'),
                TextColumn::make('company.name')->label('Company Name'),
            ])
            ->paginated(false);
    }

    public function apiData(): array
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/users');

        return $response->json();
    }
}
