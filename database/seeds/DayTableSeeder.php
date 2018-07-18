<?php

use App\Models\Day;
use Illuminate\Database\Seeder;

class DayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Day::create(['name' => 'Sunday']);
        Day::create(['name' => 'Monday']);
        Day::create(['name' => 'Tuesday']);
        Day::create(['name' => 'Wednesday']);
        Day::create(['name' => 'Thursday']);
        Day::create(['name' => 'Friday']);
        Day::create(['name' => 'Saturday']);
    }
}
