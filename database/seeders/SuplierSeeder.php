<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_suplier')->insert([
            [
                'nama_suplier' => 'PT Maju Jaya',
                'alamat_suplier' => 'Jl. Sudirman No. 123, Jakarta',
                'kontak_suplier' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_suplier' => 'CV Berkah Abadi',
                'alamat_suplier' => 'Jl. Merdeka No. 45, Bandung',
                'kontak_suplier' => '082345678901',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_suplier' => 'UD Sejahtera',
                'alamat_suplier' => 'Jl. Diponegoro No. 67, Surabaya',
                'kontak_suplier' => '083456789012',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
