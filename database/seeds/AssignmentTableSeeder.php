<?php

use App\Assignment;
use Illuminate\Database\Seeder;

class AssignmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new Assignment;
        $a->assignment_name = "Project Marking System";
        $a->save();

        // Call the assignment factory.
        factory(App\Assignment::class, 10)->create();
    }
}