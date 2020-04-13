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
        $this->call(StaffTableSeeder::class);
        $this->call(AssignmentTableSeeder::class);
        $this->call(ModuleTableSeeder::class);
    }
  }
