<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercises', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('exercise_list_id')->unsigned()->index();
            $table->integer('day_id')->unsigned()->index();
            $table->integer('set');
            $table->integer('reps');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercises');
    }
}
