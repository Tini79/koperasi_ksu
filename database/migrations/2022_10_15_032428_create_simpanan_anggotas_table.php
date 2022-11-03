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
        Schema::create('simpanan_anggotas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anggota_id')->index()->constrained('anggotas')->onDelete('cascade');
            $table->foreignId('produk_simpanan_id')->index()->constrained('produk_simpanans')->onDelete('cascade');
            $table->foreignId('rekening_simpanan_id')->index()->constrained('rekening_simpanans')->onDelete('cascade');
            $table->date('tgl_transaksi');
            $table->string('transaksi')->default('Setor');
            $table->double('saldo');
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
        Schema::dropIfExists('simpanan_anggotas');
    }
};
