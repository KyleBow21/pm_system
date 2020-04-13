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
        $m->module_name = 'Software Team Project';
        $m->assignment_id = 1;
             
    }
}
