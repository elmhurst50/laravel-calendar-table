<?php namespace SamJoyce777\LaravelCalendarTable\Providers;

use Illuminate\Support\ServiceProvider;

class CalendarServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../Database/Migrations' => database_path('migrations'),
        ], 'migrations');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
