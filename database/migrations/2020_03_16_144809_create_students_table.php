<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
<<<<<<< HEAD
            $table->string('student_name');
=======
            $table->string('name');
>>>>>>> 245f741bbacc3a700dba0f3d7a9441c802e73d7a
            $table->unsignedBigInteger('scheme_id');
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('assignment_id');
            $table->unsignedBigInteger('project_id');
            $table->timestamps();

<<<<<<< HEAD
            $table->foreign('scheme_id')->references('id')
            ->on('schemes')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('module_id')->references('id')
            ->on('modules')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('assignment_id')->references('id')
            ->on('assignments')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('module_id')->references('id')
            ->on('modules')->onDelete('cascade')->onUpdate('cascade');
=======
>>>>>>> 245f741bbacc3a700dba0f3d7a9441c802e73d7a
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
