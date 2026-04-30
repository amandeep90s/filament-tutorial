<?php

namespace App\Filament\Resources\Cities\Schemas;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('country_id')
                    ->label('Country')
                    ->options(Country::pluck('name', 'id'))
                    ->afterStateHydrated(function ($set, $state, $record) {
                        if (! $state && $record instanceof City && $record->state_id) {
                            $set('country_id', $record->state->country_id);
                        }
                    })
                    ->searchable()
                    ->reactive(),
                Select::make('state_id')
                    ->label('State')
                    ->options(function (callable $get) {
                        $country = $get('country_id');
                        if (! $country) {
                            return State::orderBy('name')->pluck('name', 'id');
                        }

                        return State::whereCountryId($country)->orderBy('name')->pluck('name', 'id');
                    })
                    ->searchable()
                    ->reactive(),
                TextInput::make('name')->required(),
            ]);
    }
}
