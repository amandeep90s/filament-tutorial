<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'start', 'end', 'is_all_day'])]
class Event extends Model
{
    //
}
