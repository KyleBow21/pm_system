<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkingFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marking_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            // Project Information
            $table->unsignedBigInteger('project_id');
            $table->string('student_name');
            $table->string('markers_email');
            $table->string('markers_type');
            $table->string('module_code');

            // Quality of Product
            $table->string('final_product_grade');
            $table->string('work_completed_grade');
            $table->string('comp_with_tech_grade');

            // Quality of Processes
            $table->string('proj_definition_grade');
            $table->string('problem_solution_grade');
            $table->string('final_testing_grade');

            // Quality of Evaluation
            $table->string('eval_work_grade');
            $table->string('critical_analysis_grade');
            
            // Quality of Presentation
            $table->string('org_diss_grade');
            $table->string('lang_grade');
            $table->string('figures_ref_grade');

            // Supervisor only
            $table->string('ind_work_grade');
            $table->string('attendance_grade');

            // Overall comments & final mark
            $table->longtext('comments');
            $table->string('final_mark');

            // Misc
            $table->string('is_technical')->nullable();

            $table->timestamps();

            $table->foreign('project_id')->references('id')
            ->on('projects')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marking_forms');
    }
}
