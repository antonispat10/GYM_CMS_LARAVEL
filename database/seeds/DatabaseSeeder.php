<?php

use App\Day;
use App\Exercise;
use App\ExerciseList;
use App\Role;
use App\User;
use App\Weight;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $this->call(RoleTableSeeder::class);
        $this->call(DayTableSeeder::class);
        $this->call(ExerciseListTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PostTableSeeder::class);
    }

}
