<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Icons\Heroicon;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->successNotification(
                    Notification::make()
                        ->title('User deleted successfully.')
                        ->body('The user has been deleted.')
                        ->icon(Heroicon::OutlinedCheckCircle)
                        ->success()
                ),
        ];
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title($this->getSavedNotificationMessage())
            ->success()
            ->icon(Heroicon::OutlinedCheckCircle)
            ->send();
    }

    protected function getSavedNotificationMessage(): ?string
    {
        return 'User updated successfully.';
    }
}
