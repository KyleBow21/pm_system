<?php

use Illuminate\Database\Seeder;
use App\Marks;
class MarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $m = new Marks();
        $m->mark_score = 90;
        $m->project_id = 1;
        $m->save();

        // Call the marks factory.
        factory(App\Marks::class, 10)->create();
    }
}
