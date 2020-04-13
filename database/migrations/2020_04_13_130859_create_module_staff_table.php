<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_staff', function (Blueprint $table) {
          //  $table->bigIncrements('id');
            $table->primary(['module_id', 'staff_id']);
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('staff_id');
            $table->timestamps();

            $table->foreign('module_id')->references('id')
            ->on('modules')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('module_staff');
    }
}
