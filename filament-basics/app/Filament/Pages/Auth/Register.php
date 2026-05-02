<?php

namespace App\Filament\Pages\Auth;

use App\Mail\WelcomeMail;
use App\Models\User;
use Filament\Auth\Pages\Register as BaseRegister;
use Illuminate\Support\Facades\Mail;

class Register extends BaseRegister
{
    protected function afterRegister(): void
    {
        $user = User::whereEmail($this->data['email'])->first();

        Mail::to($user->email)
            ->send(new WelcomeMail($user));
    }
}
