<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('assignment_id');
            $table->unsignedInteger('supervisor_id');
            $table->unsignedInteger('student_id');
            $table->timestamps();

            $table->foreign('assignment_id')->references('id')
            ->on('assignments')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('supervisor_id')->references('id')
            ->on('supervisors')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('student_id')->references('id')
            ->on('students')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
