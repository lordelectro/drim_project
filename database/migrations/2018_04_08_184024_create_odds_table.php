<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('match_id')->nullable();
            $table->dateTime('odd_date')->nullable();
            $table->string('odd_bookmakers')->nullable();
            $table->string('odd_1')->nullable();
            $table->string('odd_x')->nullable();
            $table->string('odd_2')->nullable();
            $table->string('odd_1x')->nullable();
            $table->string('odd_12')->nullable();
            $table->string('odd_x2')->nullable();
            $table->string('ah-4_5_1')->nullable();
            $table->string('ah-4_5_2')->nullable();
            $table->string('ah-4_1')->nullable();
            $table->string('ah-4_2')->nullable();
            $table->string('ah-3_5_1')->nullable();
            $table->string('ah-3_5_2')->nullable();
            $table->string('ah-3_1')->nullable();
            $table->string('ah-3_2')->nullable();
            $table->string('ah-2_5_1')->nullable();
            $table->string('ah-2_5_2')->nullable();
            $table->string('ah-2_1')->nullable();
            $table->string('ah-2_2')->nullable();
            $table->string('ah-1_5_1')->nullable();
            $table->string('ah-1_5_2')->nullable();
            $table->string('ah-1_1')->nullable();
            $table->string('ah-1_2')->nullable();
            $table->string('ah0_1')->nullable();
            $table->string('ah0_2')->nullable();
            $table->string('ah+0_5_1')->nullable();
            $table->string('ah+1_1')->nullable();
            $table->string('ah+1_2')->nullable();
            $table->string('ah+1_5_1')->nullable();
            $table->string('ah+1_5_2')->nullable();
            $table->string('ah+2_1')->nullable();
            $table->string('ah+2_2')->nullable();
            $table->string('ah+2_5_1')->nullable();
            $table->string('ah+2_5_2')->nullable();
            $table->string('ah+3_1')->nullable();
            $table->string('ah+3_2')->nullable();
            $table->string('ah+3_5_1')->nullable();
            $table->string('ah+3_5_2')->nullable();
            $table->string('ah+4_1')->nullable();
            $table->string('ah+4_2')->nullable();
            $table->string('ah+4_5_1')->nullable();
            $table->string('ah+4_5_2')->nullable();
            $table->string('o+0_5')->nullable();
            $table->string('u+0_5')->nullable();
            $table->string('o+1')->nullable();
            $table->string('u+1')->nullable();
            $table->string('o+1_5')->nullable();
            $table->string('u+1_5')->nullable();
            $table->string('o+2')->nullable();
            $table->string('u+2')->nullable();
            $table->string('o+2_5')->nullable();
            $table->string('u+2_5')->nullable();
            $table->string('o+3')->nullable();
            $table->string('u+3')->nullable();
            $table->string('o+3_5')->nullable();
            $table->string('u+3_5')->nullable();
            $table->string('o+4')->nullable();
            $table->string('u+4')->nullable();
            $table->string('o+4_5')->nullable();
            $table->string('u+4_5')->nullable();
            $table->string('o+5')->nullable();
            $table->string('u+5')->nullable();
            $table->string('o+5_5')->nullable();
            $table->string('u+5_5')->nullable();
            $table->string('bts_yes')->nullable();
            $table->string('bts_no')->nullable();
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
        Schema::dropIfExists('odds');
    }
}
