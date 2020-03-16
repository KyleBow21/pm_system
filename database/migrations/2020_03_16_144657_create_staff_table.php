<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('staff_name');
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('project_id');
            $table->timestamps();

            $table->foreign('module_id')->references('id')
            ->on('modules')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('staff');
    }
}
