<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leagues', function (Blueprint $table) {


            $table->increments('id');
            $table->Integer('legacy_id');
            $table->String('name');
            $table->String('is_cup');
            $table->Integer('current_season_id');
            $table->integer('current_round_id');
            $table->integer('current_stage_id');
            $table->integer('live_standings');
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
        Schema::dropIfExists('leagues');
    }
}
