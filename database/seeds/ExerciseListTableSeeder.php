<?php

use App\Models\ExerciseList;
use Illuminate\Database\Seeder;

class ExerciseListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExerciseList::create(['name' => '"Push Ups"']);
        ExerciseList::create(['name' => '"Squats"']);
    }
}
