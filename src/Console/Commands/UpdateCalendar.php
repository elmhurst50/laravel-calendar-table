<?php

namespace SamJoyce777\LaravelCalendarTable\Console\Commands;

use SamJoyce777\LaravelCalendarTable\Models\CalendarDay;
use SamJoyce777\LaravelCalendarTable\Models\CalendarMonth;
use SamJoyce777\LaravelCalendarTable\Models\CalendarWeek;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;

class UpdateCalendar extends Command
{
    use DispatchesJobs;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calendar:update {start_date?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the calendar database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $now = Carbon::now()->startOfDay()->addMonth();

        $start_date = $this->argument('start_date'); //should be Y-m-d

        $from = (isset($start_date)) ? Carbon::createFromFormat('Y-m-d', $start_date)->startOfDay() : Carbon::now()->subDays(2)->startOfDay();

        do{
            CalendarDay::updateOrCreate([
                'date' => $from->toDateTimeString()
            ], [
                'date' => $from->toDateTimeString(),
                'day' => $from->format('M'),
                'weekday' => $from->isWeekday()
            ]);
            $this->line('Date has been added for '. $from->format('Y-m-d') .'('. $from->format('D').')');


            if($from->format('D') == 'Mon'){
                $week = Carbon::createFromTimestamp($from->timestamp)->startOfWeek();
                CalendarWeek::updateOrCreate([
                    'week_beginning' => $week->toDateTimeString()
                ], [
                    'week_beginning' => $week->toDateTimeString(),
                    'week_number' => $week->weekOfYear
                ]);
                $this->warn('Week date has been added for '. $from->format('Y-m-d') .'('. $from->format('D').')');
            }

            if($from->format('d') == '01'){
                $month = Carbon::createFromTimestamp($from->timestamp)->startOfMonth();
                CalendarMonth::updateOrCreate([
                    'month_beginning' => $month->toDateTimeString()
                ], [
                    'month_beginning' => $month->toDateTimeString(),
                    'month_number' => $month->month,
                    'days_in_month' => $month->daysInMonth
                ]);

                $this->info('Month date has been added for '. $from->format('Y-m-d') .'('. $from->format('D').')');
            }

            $from->addDay();
        }while($from <= $now);

        $this->info('Calendar has been updated');
    }
}
