<?php

namespace Database\Seeders;

use App\Enums\LevelEnum;
use App\Models\Agunan;
use App\Models\Anggota;
use App\Models\Pegawai;
use App\Models\Pinjaman;
use App\Models\ProdukPinjaman;
use App\Models\ProdukSimpanan;
use App\Models\RekeningSimpanan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'pegawai_id' => 1,
        //     'anggota_id' => null,
        //     'username' => 'admin',
        //     'password' => Hash::make('admin'),
        //     'level' => LevelEnum::Admin->value,

        // ]);

        Anggota::create([
            'tgl_daftar' => '2022-01-01',
            'nama_anggota' => 'Nia',
            'nik' => '5104024667008809',
            'jenis_kelamin' => 'Perempuan',
            'tempat_lahir' => 'Badung',
            'tgl_lahir' => '1990-01-01',
            'pekerjaan' => 'Mentor',
            'agama' => 'Hindu',
            'status_perkawinan' => 'Cerai Hidup',
            'no_tlp' => '081936278911',
            'alamat' => 'Badung',
        ]);

        Anggota::create([
            'tgl_daftar' => '2022-01-01',
            'nama_anggota' => 'Angga',
            'nik' => '5104024666656809',
            'jenis_kelamin' => 'Perempuan',
            'tempat_lahir' => 'Badung',
            'tgl_lahir' => '1990-01-01',
            'pekerjaan' => 'Mentor',
            'agama' => 'Hindu',
            'status_perkawinan' => 'Cerai Hidup',
            'no_tlp' => '081936278911',
            'alamat' => 'Badung',
        ]);

        Pegawai::create([
            'id' => 1,
            'no_pegawai' => '1127',
            'nama_pegawai' => 'Ryan',
            'nik' => '5104024667007809',
            'jenis_kelamin' => 'Laki-laki',
            'tempat_lahir' => 'Gianyar',
            'tgl_lahir' => '1990-01-01',
            'no_tlp' => '081936278911',
            'alamat' => 'Gianyar',
            'divisi' => 'Admin',
        ]);

        // Pegawai::create([
        //     'id' => 2,
        //     'no_pegawai' => '1167',
        //     'nama_pegawai' => 'Ryan',
        //     'nik' => '5104024667007809',
        //     'jenis_kelamin' => 'Laki-laki',
        //     'tempat_lahir' => 'Gianyar',
        //     'tgl_lahir' => '1990-01-01',
        //     'no_tlp' => '081936278911',
        //     'alamat' => 'Gianyar',
        //     'divisi' => 'Bendahara',
        // ]);

        ProdukSimpanan::create(
            [
                'no_produk' => '00001',
                'produk' => 'Simpanan Pokok',
                // 'bunga' => '1',
            ],
        );

        ProdukSimpanan::create(
            [
                'no_produk' => '00002',
                'produk' => 'Simpanan Wajib',
                // 'bunga' => '2',
            ],
        );

        ProdukSimpanan::create(
            [
                'no_produk' => '00003',
                'produk' => 'Simpanan Sukarela',
                // 'bunga' => '1',
            ],
        );

        ProdukSimpanan::create(
            [
                'no_produk' => '00004',
                'produk' => 'Hibah/Donasi',
                // 'bunga' => '1',
            ],
        );

        RekeningSimpanan::create(
            [
                'anggota_id' => 1,
                'no_rekening' => '001',
                // 'admin_id' => 1,
                'tgl_daftar' => '2022-01-01',
                // 'bunga' => 1.5,
                // 'saldo' => 1000000,
            ],
        );

        Agunan::create([
            'pinjaman_id' => 1,
            'nominal_jaminan'    => 10000,
            'jaminan'    => 'Motor',
            'keterangan' => 'Warna merah'
        ]);

        // ProdukPinjaman::create(
        //     [
        //         'no_produk' => '1157',
        //         'produk' => 'Pinjaman Harian',
        //         'bunga' => '2',
        //     ],
        // );

        // ProdukPinjaman::create(
        //     [
        //         'no_produk' => '1157',
        //         'produk' => 'Pinjaman Bulanan',
        //         'bunga' => '2',
        //     ],
        // );
    }
}
