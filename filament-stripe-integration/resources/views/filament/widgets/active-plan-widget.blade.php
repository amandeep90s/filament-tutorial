<?php

$data = $this->getData();

$plan = $data['plan'];
$status = $data['status'];
$endsAt = $data['ends_at'];
$isActive = $data['is_active'];

?>

<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-lg font-bold text-gray-900 dark:text-white">Current Plan</h2>

                @if($plan)
                    <div style="margin-top: 1rem;" class="mt-2 space-y-1">
                        <p class="text-2xl font-bold text-primary-600">
                            {{ $plan->name }}
                        </p>

                        <p style="margin-top: 0.5rem;" class="text-gray-500 dark:text-gray-400">
                            ${{ number_format($plan->price / 100, 2) }} / {{ $endsAt !== 'N/A' ? 'until ' . $endsAt : 'recurring' }}
                        </p>
                    </div>
                @else
                    <p class="mt-2 text-gray-500">No active plan</p>
                @endif
            </div>

            <div style="margin-top: 1rem;">
                @if($isActive)
                    <x-filament::badge color="success" size="lg">Active</x-filament::badge>
                @else
                    <x-filament::badge color="danger" size="lg">Inactive</x-filament::badge>
                @endif
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
