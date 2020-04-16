<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new User();
        $u->name = "Ben Mora";
        $u->email = "mora@gmail.com";
        $u->role = "Admin";
        $u->scheme_id = 1;
        $u->module_id = 1;
        $u->password = bcrypt('password');
        $u->save();

        $u = new User();
        $u->name = "Admin";
        $u->email = "admin@gmail.com";
        $u->role = "Admin";
        $u->scheme_id = 2;
        $u->module_id = 2;
        $u->password = bcrypt('password');
        $u->save();
    }
}
