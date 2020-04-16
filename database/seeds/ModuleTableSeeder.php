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
        $m->module_name = 'CSCM10 - Software Team Project';
        $m->assignment_id = 1;

        $m->save();

        $m = new Module;
        $m->module_name = 'CSCM11 - Some other module';
        $m->assignment_id = 1;

        $m->save();

        $m = new Module;
        $m->module_name = 'CSCM12 - Yet another module';
        $m->assignment_id = 1;

        $m->save();

        // Call the module factory.
        factory(App\Module::class, 10)->create();
    }
}
