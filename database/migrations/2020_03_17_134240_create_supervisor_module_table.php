<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisor_module', function (Blueprint $table) {
          //  $table->bigIncrements('id');
            $table->primary(['supervisor_id', 'module_id']);
            $table->unsignedBigInteger('supervisor_id');
            $table->unsignedBigInteger('module_id');
            $table->timestamps();

            $table->foreign('supervisor_id')->references('id')
            ->on('supervisors')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('supervisor_module');
    }
}
