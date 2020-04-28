<?php

use Illuminate\Database\Seeder;
use App\Scheme;
class SchemeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s = new Scheme();
        $s->scheme_name = "MSc Advanced Software Technology";
        $s->module_id = 1;
        $s->save();

        $s = new Scheme();
        $s->scheme_name = "MSc Computer Science";
        $s->module_id = 1;
        $s->save();

        $s = new Scheme();
        $s->scheme_name = "MSc Big Data";
        $s->module_id = 1;
        $s->save();

        $s = new Scheme();
        $s->scheme_name = "MEng Software Engineering";
        $s->module_id = 1;
        $s->save();
    }
}
