<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AssignmentTableSeeder::class);
        $this->call(ModuleTableSeeder::class);
        $this->call(SchemeTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProjectTableSeeder::class);
        $this->call(MarksTableSeeder::class);
        $this->call(ModuleUserTableSeeder::class);
    }
  }
