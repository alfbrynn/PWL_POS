<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 1, // Nanti Anda yang isi sesuai dengan kategori yang ada
                'barang_kode' => 'BRG001',
                'barang_nama' => 'Laptop Asus ROG',
                'harga_beli' => 15000000,
                'harga_jual' => 17000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 1,
                'barang_kode' => 'BRG002',
                'barang_nama' => 'Monitor LG 24 Inch',
                'harga_beli' => 2500000,
                'harga_jual' => 3000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 2,
                'barang_kode' => 'BRG003',
                'barang_nama' => 'Kemeja Pria Slim Fit',
                'harga_beli' => 120000,
                'harga_jual' => 150000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 2,
                'barang_kode' => 'BRG004',
                'barang_nama' => 'Celana Jeans Wanita',
                'harga_beli' => 200000,
                'harga_jual' => 250000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 3,
                'barang_kode' => 'BRG005',
                'barang_nama' => 'Mie Instan 5 Bungkus',
                'harga_beli' => 15000,
                'harga_jual' => 20000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 3,
                'barang_kode' => 'BRG006',
                'barang_nama' => 'Biskuit Coklat',
                'harga_beli' => 10000,
                'harga_jual' => 15000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 4,
                'barang_kode' => 'BRG007',
                'barang_nama' => 'Kopi Arabika 250gr',
                'harga_beli' => 50000,
                'harga_jual' => 60000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 4,
                'barang_kode' => 'BRG008',
                'barang_nama' => 'Teh Hijau Celup',
                'harga_beli' => 20000,
                'harga_jual' => 25000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 5,
                'barang_kode' => 'BRG009',
                'barang_nama' => 'Meja Kayu Minimalis',
                'harga_beli' => 500000,
                'harga_jual' => 650000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 5,
                'barang_kode' => 'BRG010',
                'barang_nama' => 'Rak Buku Besi',
                'harga_beli' => 300000,
                'harga_jual' => 400000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('m_barang')->insert($data);
    }
}
