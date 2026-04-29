<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStatsWidget extends StatsOverviewWidget
{
    protected static ?int $sort = 1;
    
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->description('Total number of registered users')
                ->descriptionIcon(Heroicon::ArrowUpLeft, IconPosition::Before)
                ->color('success')
                ->chart(
                    User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                        ->whereYear('created_at', now()->year)
                        ->groupBy('month')
                        ->orderBy('month')
                        ->pluck('count')
                        ->toArray()
                ),
            Stat::make('Total Posts', Post::count())
                ->description('Total number of posts of this year')
                ->descriptionIcon(Heroicon::DocumentChartBar, IconPosition::Before)
                ->color('warning')
                ->chart(
                    Post::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                        ->whereYear('created_at', now()->year)
                        ->groupBy('month')
                        ->orderBy('month')
                        ->pluck('count')
                        ->toArray()
                ),
            Stat::make('Total Products', Post::count())
                ->description('Total number of products of this year')
                ->descriptionIcon(Heroicon::ShoppingCart, IconPosition::Before)
                ->color('info')
                ->chart(
                    Product::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                        ->whereYear('created_at', now()->year)
                        ->groupBy('month')
                        ->orderBy('month')
                        ->pluck('count')
                        ->toArray()
                ),
        ];
    }
}
