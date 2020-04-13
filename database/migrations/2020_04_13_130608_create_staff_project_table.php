<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_project', function (Blueprint $table) {
          //  $table->bigIncrements('id');
            $table->primary(['staff_id', 'project_id']);
            $table->unsignedBigInteger('staff_id');
            $table->unsignedBigInteger('project_id');
            $table->timestamps();

            $table->foreign('staff_id')->references('id')
            ->on('staff')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('staff_project');
    }
}
