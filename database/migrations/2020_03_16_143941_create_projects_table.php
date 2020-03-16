<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('project_name');
            $table->multiLineString('project_description');
            $table->unsignedBigInteger('supervisor_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('scheme_id');
            $table->unsignedBigInteger('module_id');
            $table->timestamps();

            $table->foreign('supervisor_id')->references('id')
            ->on('supervisors')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('student_id')->references('id')
            ->on('students')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('scheme_id')->references('id')
            ->on('schemes')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('module_id')->references('id')
            ->on('modules')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
