<?php

use App\Day;
use App\Exercise;
use App\Exerciselist;
use App\Role;
use App\User;
use App\Weight;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=0');


        Role::insert([
            'name' => 'Admin',
        ]);

        Day::insert(['name' => '"Sunday"']);
        Day::insert(['name' => '"Monday"']);
        Day::insert(['name' => '"Thuesday"']);
        Day::insert(['name' => '"Wednesday"']);
        Day::insert(['name' => '"Thursday"']);
        Day::insert(['name' => '"Friday"']);
        Day::insert(['name' => '"Saturday"']);

        Exerciselist::insert(['name' => '"Push Ups"']);
        Exerciselist::insert(['name' => '"Squats"']);


        $role_admin = Role::where('name','admin')->first();

        $user = new User();
        $user->id = 100;
        $user->name = 'Antonis';
        $user->surname =  'Pat';
        $user->email = 'admin@admin.com';
        $user->password =  bcrypt('543210');
        $user->telephone = 6940222;
        $user->address =  'Ret 22';
        $user->roles()->attach($role_admin);
        $user->save();



//        factory(App\User::class, 3)->create()->each(function($user){
//
//            $user->weight()->save(factory(App\Weight::class)->make());
//            $user->posts()->save(factory(App\Post::class)->make());
//
//        });

//        factory(App\Exercise::class, 5)->create();
        factory(App\Post::class, 4)->create();
//
//        factory(App\Day::class, 5)->create();
//        factory(App\Exerciselist::class, 5)->create();
//
//
//        DB::table('roles')->insert([
//            'name' => 'User',
//
//        ]);
//        DB::table('roles')->insert([
//            'name' => 'Author',
//
//        ]);
//
//
//        $role_user = Role::where('name','user')->first();
//
//
//
//        $day = Day::where('name','Wednesday')->first();
//
//        $exercise = new Exercise();
//        $exercise->id = 11;
//        $exercise->user_id = 4;
//        $exercise->day_id = 10;
//        $exercise->exerciselist_id = 1;
//        $exercise->days()->attach($day);




    }



}
