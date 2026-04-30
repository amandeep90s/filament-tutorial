<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Icons\Heroicon;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title($this->getCreatedNotificationMessage())
            ->success()
            ->icon(Heroicon::OutlinedCheckCircle)
            ->send();
    }

    protected function getCreatedNotificationMessage(): ?string
    {
        return 'User created successfully.';
    }
}
