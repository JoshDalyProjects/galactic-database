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
        Schema::table('armament', function (Blueprint $table) {
            $table->foreignId('spacecraft_id');
            $table->foreign('spacecraft_id')->references('id')->on('spacecraft');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('armament', function (Blueprint $table) {
            $table->dropForeign('spacecraft_id');
        });
    }
};
