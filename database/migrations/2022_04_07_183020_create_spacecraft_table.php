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
        Schema::create('spacecraft', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('class');
            $table->json('armament');
            $table->integer('crew');
            $table->binary('image')->nullable();
            $table->double('price');
            $table->string('status');
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
        Schema::dropIfExists('spacecraft');
    }
};
