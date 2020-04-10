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
            $table->string('module_name');
            $table->unsignedBigInteger('assignment_id');
            $table->unsignedBigInteger('staff_id');
            $table->timestamps();

            $table->foreign('assignment_id')->references('id')
            ->on('assignments')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('staff_id')->references('id')
            ->on('staff')->onDelete('cascade')->onUpdate('cascade');


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
