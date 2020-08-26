<?php

use App\User;
use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'special' => 'all-access',
        ]);

        User::create([
         'name' => 'admin',
         'email' => 'admin@gmail.com',
         'password' => bcrypt('123456'),
        ]);

        DB::table('role_user')->insert([
         'role_id' => '1',
         'user_id' => '1',
        ]);



    }
}
