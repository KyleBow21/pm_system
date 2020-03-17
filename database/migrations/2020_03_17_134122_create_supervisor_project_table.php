<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisor_project', function (Blueprint $table) {
          //  $table->bigIncrements('id');
            $table->primary(['supervisor_id', 'project_id']);
            $table->unsignedBigInteger('supervisor_id');
            $table->unsignedBigInteger('project_id');
            $table->timestamps();

            $table->foreign('supervisor_id')->references('id')
            ->on('supervisors')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('supervisor_project');
    }
}
