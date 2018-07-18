<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name','Admin')->first();

        $user = \App\Models\User::firstOrCreate([
            'name' => 'Antonis',
            'surname' => 'Pat',
            'email' => 'admin@admin.com',
            'password' => bcrypt('543210'),
            'telephone' => 6940222,
            'address' => 'Ret 22',
        ]);

        $user->roles()->attach($role_admin);
    }
}
