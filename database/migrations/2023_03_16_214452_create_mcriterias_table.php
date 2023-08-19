<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcriterias', function (Blueprint $table) {
            $table->id();
            $table->string('code_criteria')->unique();
            $table->string('name_criteria');
            $table->float('value_criteria');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('mtypes')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mcriterias');
    }
};
