<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\TodayUserStats;
use App\Models\User;
use BackedEnum;
use Filament\Pages\Enums\SubNavigationPosition;
use Filament\Pages\Page;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;

class Reports extends Page implements  HasTable
{
    use InteractsWithTable;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::DocumentCheck;

    protected static ?string $navigationLabel = 'Reports';

    protected static ?string $title = 'User Reports';
    protected static ?SubNavigationPosition $subNavigationPosition = SubNavigationPosition::End;

    protected string $view = 'filament.pages.reports';

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }

    public function getHeaderWidgets(): array
    {
        return [
            TodayUserStats::class
        ];
    }

    protected function getTableQuery(): Builder|Relation|null
    {
        return User::query()->whereDate('created_at', today());
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->label('Name'),
            TextColumn::make('email')->label('Email'),
            TextColumn::make('country.name')->label('Country'),
            TextColumn::make('state.name')->label('State'),
            TextColumn::make('city.name')->label('City'),
            TextColumn::make('created_at')->label('Registered At')->dateTime(),
        ];
    }
}
