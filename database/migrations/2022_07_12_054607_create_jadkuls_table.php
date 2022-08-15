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
        Schema::create('jadkuls', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_pengampu');
            $table->integer('kode_jam');
            $table->integer('kode_hari');
            $table->integer('kode_ruang');
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
        Schema::dropIfExists('jadkuls');
    }
};
