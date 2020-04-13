<?php

use App\Module;
use Illuminate\Database\Seeder;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $m = new Module;
        $m->module_name = 'CSCM10';
        $m->assignment_id = 1;
        $m->staff_id = 1;
        $m->save();

        $m = new Module;
        $m->module_name = 'CSCM11';
        $m->assignment_id = 1;
        $m->staff_id = 1;
        $m->save();

        $m = new Module;
        $m->module_name = 'CSCM12';
        $m->assignment_id = 1;
        $m->staff_id = 1;
        $m->save();
    }
}