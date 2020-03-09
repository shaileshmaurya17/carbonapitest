<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarbonapisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carbonapis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('userid');
            $table->string('activity');
            $table->string('activityType');
            $table->string('fuelType');
            $table->string('mode');
            $table->string('country'); 
            $table->string('response'); 
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
        Schema::dropIfExists('carbonapis');
    }
}
