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
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('staff_id');
            $table->unsignedBigInteger('module_id');
            $table->timestamps();

            $table->foreign('student_id')->references('id')
            ->on('students')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('staff_id')->references('id')
            ->on('staff')->onDelete('cascade')->onUpdate('cascade');

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
