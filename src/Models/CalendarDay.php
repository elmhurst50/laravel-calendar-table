<?php

namespace SamJoyce777\LaravelCalendarTable\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CalendarDay extends Model
{
    protected $table = 'calendar_days';

    protected $guarded = ['id'];
}
