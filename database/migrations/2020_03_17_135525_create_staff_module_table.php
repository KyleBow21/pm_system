<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_module', function (Blueprint $table) {
          //  $table->bigIncrements('id');
            $table->primary(['staff_id', 'module_id']);
            $table->unsignedBigInteger('staff_id');
            $table->unsignedBigInteger('module_id');
            $table->timestamps();

            $table->foreign('staff_id')->references('id')
            ->on('staff')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('staff_module');
    }
}
