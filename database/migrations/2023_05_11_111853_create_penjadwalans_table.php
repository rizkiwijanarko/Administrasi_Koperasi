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
        Schema::create('penjadwalans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_jadwal');
            $table->string('jadwal_rapat');
            $table->string('jadwal_shift');
            $table->string('jadwal_lain');
            $table->string('agenda_jadwal');
            $table->date('tanggal_jadwal');
            $table->string('deskripsi_jadwal');
            $table->string('tujuan_jadwal');
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
        Schema::dropIfExists('penjadwalans');
    }
};
