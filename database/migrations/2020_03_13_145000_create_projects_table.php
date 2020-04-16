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
            $table->string('project_year');
            $table->string('project_type');
            $table->longText('project_description');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('module_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade')->onUpdate('cascade');

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
