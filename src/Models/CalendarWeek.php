<?php

namespace SamJoyce777\LaravelCalendarTable\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CalendarWeek extends Model
{
    protected $table = 'calendar_weeks';

    protected $guarded = ['id'];
}
