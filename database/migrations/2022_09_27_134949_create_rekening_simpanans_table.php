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
        Schema::create('rekening_simpanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anggota_id')->index()->constrained('anggotas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('no_rekening');
            $table->date('tgl_daftar');
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
        Schema::dropIfExists('rekening_simpanans');
    }
};
