<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class UserPieWidget extends ChartWidget
{
    protected ?string $heading = 'User Pie Widget';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Users created',
                    'data' => [300, 50, 100],
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                    ],
                ],
            ],
            'labels' => ['India', 'Usa', 'Canada'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
