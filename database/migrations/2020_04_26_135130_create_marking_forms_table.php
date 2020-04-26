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
            $table->unsignedBigInteger('project_id');

            // Quality of Product
            $table->string('final_product')->nullable();
            $table->string('work_completed')->nullable();
            $table->string('comp_with_tech')->nullable();

            // Quality of Process
            $table->string('proj_definition')->nullable();
            $table->string('problem_solution')->nullable();
            $table->string('final_testing')->nullable();

            // Quality of Evaluation
            $table->string('org_diss')->nullable();
            $table->string('english_gram_punc')->nullable();
            $table->string('use_tables_fig_ref')->nullable();

            // Supervisor only
            $table->string('ind_work')->nullable();
            $table->string('attendance')->nullable();

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
