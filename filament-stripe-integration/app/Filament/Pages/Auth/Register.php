<?php

namespace App\Filament\Pages\Auth;

use App\Models\Plan;
use App\Models\User;
use Filament\Auth\Pages\Register as RegisterPage;
use Filament\Forms\Components\Radio;
use Filament\Schemas\Schema;

class Register extends RegisterPage
{
    public ?string $selectedPlan = null;

    public function form(Schema $schema): Schema
    {
        $plans = Plan::all();

        return $schema->schema([
            $this->getNameFormComponent(),
            $this->getEmailFormComponent(),
            $this->getPasswordFormComponent(),
            $this->getPasswordConfirmationFormComponent(),
            Radio::make('selectedPlan')
                ->label('Choose Plan')
                ->options($plans->mapWithKeys(fn (Plan $plan) => [
                    $plan->id => $plan->name
                ]))
                ->descriptions($plans->mapWithKeys(fn (Plan $plan) => [
                    $plan->id => '$'.number_format($plan->price / 100, 2).'/Monthly',
                ]))
                ->required()
                ->inline()
                ->inlineLabel(false)
        ]);
    }

    protected function afterRegister(): void
    {
        $plan = Plan::find($this->data['selectedPlan']);
        $user = User::whereEmail($this->data['email'])->first();

        $checkout = $user
            ->newSubscription('default', $plan->stripe_price_id)
            ->checkout([
                'success_url' => route('stripe.success').'?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('filament.admin.auth.register').'?checkout=cancel',
                'metadata' => [
                    'stripe_price_id' => $plan->stripe_price_id,
                ]
            ]);

        $this->dispatch('stripe-redirect', url: $checkout->url);
    }
}
