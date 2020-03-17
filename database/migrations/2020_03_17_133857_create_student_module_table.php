<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_module', function (Blueprint $table) {
          //  $table->bigIncrements('id');
            $table->primary(['student_id', 'module_id']);
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('module_id');
            $table->timestamps();

            $table->foreign('student_id')->references('id')
            ->on('students')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('student_module');
    }
}
