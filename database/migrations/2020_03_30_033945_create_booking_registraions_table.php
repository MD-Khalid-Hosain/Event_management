<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingRegistraionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_registraions', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('user_email');
            $table->string('event_title');
            $table->string('event_category');
            $table->string('published_at');
            $table->string('event_location');
            $table->integer('user_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_registraions');
    }
}
