<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TodayUserStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Today Users', User::whereDate('created_at', today())->count())
                ->label('Today Users')
                ->description('Total number of users')
                ->color('success')
                ->icon(Heroicon::UserGroup),
        ];
    }
}
