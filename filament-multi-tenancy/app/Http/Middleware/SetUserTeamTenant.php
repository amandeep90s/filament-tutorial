<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetUserTeamTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if (! $user) {
            return redirect()->route('filament.company.auth.login');
        }

        $team = $user->teams()->first();

        if (! $team) {
            abort(403, 'You do not have any company');
        }

        Filament::setTenant($team);

        return $next($request);
    }
}
