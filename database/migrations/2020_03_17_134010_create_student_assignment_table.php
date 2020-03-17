<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAssignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_assignment', function (Blueprint $table) {
          //  $table->bigIncrements('id');
            $table->primary(['student_id', 'assignment_id']);
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('assignment_id');
            $table->timestamps();

            $table->foreign('student_id')->references('id')
            ->on('students')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('assignment_id')->references('id')
            ->on('assignments')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_assignment');
    }
}
