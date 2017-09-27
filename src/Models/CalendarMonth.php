<?php

namespace SamJoyce777\LaravelCalendarTable\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CalendarMonth extends Model
{
    protected $table = 'calendar_months';

    protected $guarded = ['id'];
}
