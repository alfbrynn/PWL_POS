<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penjualan_id' => 1,
                'user_id' => 1, // Sesuaikan dengan user yang ada
                'pembeli' => 'Budi Santoso',
                'penjualan_kode' => 'PJL001',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 2,
                'user_id' => 1,
                'pembeli' => 'Siti Aminah',
                'penjualan_kode' => 'PJL002',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 3,
                'user_id' => 1,
                'pembeli' => 'Rudi Hartono',
                'penjualan_kode' => 'PJL003',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 4,
                'user_id' => 1,
                'pembeli' => 'Ani Susanti',
                'penjualan_kode' => 'PJL004',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 5,
                'user_id' => 1,
                'pembeli' => 'Dodi Prasetyo',
                'penjualan_kode' => 'PJL005',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 6,
                'user_id' => 1,
                'pembeli' => 'Wahyu Saputra',
                'penjualan_kode' => 'PJL006',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 7,
                'user_id' => 1,
                'pembeli' => 'Lisa Amelia',
                'penjualan_kode' => 'PJL007',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 8,
                'user_id' => 1,
                'pembeli' => 'Agus Riyadi',
                'penjualan_kode' => 'PJL008',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 9,
                'user_id' => 1,
                'pembeli' => 'Maya Sari',
                'penjualan_kode' => 'PJL009',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 10,
                'user_id' => 1,
                'pembeli' => 'Eko Wibowo',
                'penjualan_kode' => 'PJL010',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('t_penjualan')->insert($data);
    }
}
