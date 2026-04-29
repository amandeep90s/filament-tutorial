<?php

namespace App\Filament\Resources\Users\Widgets;

use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserCounterWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->description('All registered users')
                ->descriptionIcon(Heroicon::Users, IconPosition::Before)
                ->color('success'),
            Stat::make('Total Users from India', User::whereHas('country', fn ($query) => $query
                ->where('name', 'India'))
                ->count())
                ->description('All registered users in India')
                ->descriptionIcon(Heroicon::OutlinedFlag, IconPosition::Before)
                ->color('danger'),
            Stat::make('Total Users from United States', User::whereHas('country', fn ($query) => $query
                ->where('name', 'United States'))
                ->count())
                ->description('All registered users in United States')
                ->descriptionIcon(Heroicon::Flag, IconPosition::Before)
                ->color('warning'),
        ];
    }
}
