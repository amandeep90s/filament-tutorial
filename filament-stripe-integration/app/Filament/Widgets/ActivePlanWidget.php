<?php

namespace App\Filament\Widgets;

use App\Models\Plan;
use Filament\Widgets\Widget;

class ActivePlanWidget extends Widget
{
    protected string $view = 'filament.widgets.active-plan-widget';

    public function getData(): array
    {
        $user = auth()->user();
        $subscription = $user->subscriptions()->active()->first();
        $plan = null;

        if ($subscription) {
            $plan = Plan::where('stripe_price_id', $subscription->stripe_price)->first();
        }

        return [
            'plan' => $plan,
            'is_active' => $subscription ? $subscription->active() : false,
            'status' => $subscription ? $subscription->stripe_status : 'N/A',
            'ends_at' => $subscription && $subscription->ends_at ? $subscription->ends_at->toDateString() : 'N/A',
        ];
    }
}
