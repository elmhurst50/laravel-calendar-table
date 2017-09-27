<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarMonthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendar_months', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('month_beginning');
            $table->integer('month_number');
            $table->integer('days_in_month');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('calendar_months');
    }
}
