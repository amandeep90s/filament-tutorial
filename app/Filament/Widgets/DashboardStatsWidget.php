<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Builder;

class DashboardStatsWidget extends StatsOverviewWidget
{
    use InteractsWithPageFilters;

    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $startDate = $this->pageFilters['startDate'] ?? null;
        $endDate = $this->pageFilters['endDate'] ?? null;

        return [
            Stat::make(
                'Total Users',
                User::query()
                    ->when($startDate, fn (Builder $query) => $query->whereDate('created_at', '>=', $startDate))
                    ->when($endDate, fn (Builder $query) => $query->whereDate('created_at', '<=', $endDate))
                    ->count()
            )
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
            Stat::make(
                'Total Posts',
                Post::query()
                    ->when($startDate, fn (Builder $query) => $query->whereDate('created_at', '>=', $startDate))
                    ->when($endDate, fn (Builder $query) => $query->whereDate('created_at', '<=', $endDate))
                    ->count()
            )
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
            Stat::make(
                'Total Products',
                Product::query()
                    ->when($startDate, fn (Builder $query) => $query->whereDate('created_at', '>=', $startDate))
                    ->when($endDate, fn (Builder $query) => $query->whereDate('created_at', '<=', $endDate))
                    ->count()
            )
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
