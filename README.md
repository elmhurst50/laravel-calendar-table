# Laravel Calendar Table

This package contains migrations and models of basic calendar tables to use when joining other mysql tables
to speed things up compared to inbuilt mysql calendar commands. It requires a cron job on the supplied console commands
to update the database.

### Installing

Download or or use composer, currently not on packagist.org

Add the service provider to your config/app.php file
```
 SamJoyce777\LaravelCalendarTable\Providers\CalendarServiceProvider::class,
```

Then we need to publish the migrations
```
 php artisan vendor:publish --provider="SamJoyce777\LaravelCalendarTable\Providers\CalendarServiceProvider"
```

In the console kernal you will need to add this. You will need to run the cron once a day, ie at 01:00
```
 SamJoyce777\LaravelCalendarTable\Console\Commands\UpdateCalendar\UpdateCalendar::class
```



