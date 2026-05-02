<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\StripeClient;

class CheckoutSuccessController extends Controller
{
    public function handle(Request $request)
    {
        $user = auth()->user();

        $sessionId = $request->session_id;

        if (! $sessionId) {
            return redirect()->route('filament.admin.auth.register')->with('error', 'Invalid checkout session.');
        }

        $stripe = new StripeClient(config('cashier.secret'));
        $session = $stripe->checkout->sessions->retrieve($sessionId);

        if ($session->subscription) {
            $user->subscriptions()->create([
                'type' => 'default',
                'stripe_id' => $session->subscription,
                'stripe_status' => 'active',
                'stripe_price' => $session->metadata->stripe_price_id,
            ]);
        }

        return redirect()
            ->route('filament.admin.pages.dashboard')
            ->with('success', 'Subscription activated successfully!');
    }
}
