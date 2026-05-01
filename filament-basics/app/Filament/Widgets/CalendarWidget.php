<?php

namespace App\Filament\Widgets;

use App\Models\Event;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Illuminate\Database\Eloquent\Model;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CalendarWidget extends FullCalendarWidget
{

    public Model | string | null $model = Event::class;

    /**
     * FullCalendar will call this function whenever it needs new event data.
     * This is triggered when the user clicks prev/next or switches views on the calendar.
     */
    public function fetchEvents(array $fetchInfo): array
    {
        info($fetchInfo);
        // You can use $fetchInfo to filter events by date.
        // This method should return an array of event-like objects. See: https://github.com/saade/filament-fullcalendar/blob/3.x/#returning-events
        // You can also return an array of EventData objects. See: https://github.com/saade/filament-fullcalendar/blob/3.x/#the-eventdata-class
        return Event::query()
            ->whereBetween('start', [$fetchInfo['start'], $fetchInfo['end']])
            ->get()
            ->map(function (Event $event) {
                return [
                    'id' => $event->id,
                    'title' => $event->name,
                    'start' => $event->start,
                    'end' => $event->end,
                    'allDay' => $event->is_all_day,
                ];
            })
            ->toArray();
    }

    public function getFormSchema(): array
    {
        return [
            TextInput::make('name'),
            DateTimePicker::make('start'),
            DateTimePicker::make('end'),
            Toggle::make('is_all_day')->default(false),
        ];
    }
}
