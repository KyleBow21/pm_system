<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleSchemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_scheme', function (Blueprint $table) {
          //  $table->bigIncrements('id');
            $table->primary(['module_id', 'scheme_id']);
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
        Schema::dropIfExists('module_scheme');
    }
}
