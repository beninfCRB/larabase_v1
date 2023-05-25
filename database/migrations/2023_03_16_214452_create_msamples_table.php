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
        Schema::create('msamples', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->double('value');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('mtypes')->onDelete('restrict');
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
        Schema::dropIfExists('msamples');
    }
};
