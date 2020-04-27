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
            $table->string('student_name')->nullable();
            $table->string('markers_email')->nullable();
            $table->string('markers_type')->nullable();
            $table->string('module_code')->nullable();

            // Quality of Product
            $table->string('final_product_grade')->nullable();
            $table->string('work_completed_grade')->nullable();
            $table->string('comp_with_tech_grade')->nullable();

            // Quality of Processes
            $table->string('proj_definition_grade')->nullable();
            $table->string('problem_solution_grade')->nullable();
            $table->string('final_testing_grade')->nullable();

            // Quality of Evaluation
            $table->string('eval_work_grade')->nullable();
            $table->string('critical_analysis_grade')->nullable();
            
            // Quality of Presentation
            $table->string('org_diss_grade')->nullable();
            $table->string('lang_grade')->nullable();
            $table->string('figures_ref_grade')->nullable();

            // Supervisor only
            $table->string('ind_work_grade')->nullable();
            $table->string('attendance_grade')->nullable();

            // Overall comments & final mark
            $table->string('comments')->nullable();
            $table->string('final_mark')->nullable();

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
