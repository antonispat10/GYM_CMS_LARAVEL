<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDayExerciseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_exercises', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exercise_id')->unsigned()->index();

            $table->integer('day_id')->unsigned()->index();

            $table->foreign('exercise_id')->references('id')->on('exercises')->onDelete('cascade');

            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');
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
        Schema::dropIfExists('day_exercises');
    }
}
