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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_daftar');
            $table->string('nama_anggota');
            $table->string('nik');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('pekerjaan');
            $table->string('agama');
            $table->string('status_perkawinan');
            $table->string('no_tlp');
            $table->string('alamat');
            $table->integer('simpanan_pokok')->default(10000);
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
        Schema::dropIfExists('anggotas');
    }
};
