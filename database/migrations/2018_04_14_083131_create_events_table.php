<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('match_id')->nullable();
            $table->string('country_id')->nullable();
            $table->string('country_name')->nullable();
            $table->string('league_id')->nullable();
            $table->string('league_name')->nullable();
            $table->date('match_date')->nullable();
            $table->string('match_status')->nullable();
            $table->time('match_time')->nullable();
            $table->string('match_hometeam_name')->nullable();
            $table->string('match_hometeam_score')->nullable();
            $table->string('match_awayteam_name')->nullable();
            $table->string('match_awayteam_score')->nullable();
            $table->string('match_hometeam_halftime_score')->nullable();
            $table->string('match_awayteam_halftime_score')->nullable();
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
        Schema::dropIfExists('events');
    }
}
