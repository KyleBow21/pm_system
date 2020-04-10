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
            $table->string('student_name');
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('scheme_id');
            $table->timestamps();

            $table->foreign('module_id')->references('id')
            ->on('modules')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('scheme_id')->references('id')
            ->on('schemes')->onDelete('cascade')->onUpdate('cascade');

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
