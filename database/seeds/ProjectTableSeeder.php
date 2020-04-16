<?php

use Illuminate\Database\Seeder;
use App\Project;
class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new Project();
        $p->project_name = "Project Name 1";
        $p->project_year = "2020";
        $p->project_type = "Technical";
        $p->project_description = "This is description of Project 1";
        $p->user_id = 1;
        $p->module_id =  1;
        $p->save();

        // Call the project factory.
        factory(App\Project::class, 50)->create();
    }
}
