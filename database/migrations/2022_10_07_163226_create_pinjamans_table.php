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
        Schema::create('pinjamans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anggota_id')->index()->constrained('anggotas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('no_pinjaman');
            $table->string('agunan');
            $table->integer('bunga');
            $table->double('jumlah_pinjaman');
            // $table->double('jumlah_pinjaman_cair');
            $table->date('tgl_pinjaman');
            $table->integer('jangka_waktu_pinjaman');
            $table->double('provisi');
            $table->double('materai');
            $table->double('notaris');
            $table->double('simpanan_wajib')->nullable();
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
        Schema::dropIfExists('pinjamans');
    }
};
