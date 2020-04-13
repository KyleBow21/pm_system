<?php

use App\Staff;
use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s = new Staff;
        $s->staff_name = "Kyle";
        $s->staff_role = "Lecturer";
        $s->save();

        $s = new Staff;
        $s->staff_name = "Callum";
        $s->staff_role = "Supervisor";
        $s->save();
    }
}
