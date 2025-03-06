<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $barangs = [
            [
                'nama_barang' => 'Laptop ASUS',
                'kategori' => 'Elektronik',
                'stok' => 10,
                'harga_modal' => 7000000,
                'harga_jual' => 8500000,
                'barang_terjual' => 3,
                'total_pendapatan' => 8500000 * 3,
                'total_laba' => (8500000 - 7000000) * 3
            ],
            [
                'nama_barang' => 'Baju Koko',
                'kategori' => 'Pakaian',
                'stok' => 20,
                'harga_modal' => 100000,
                'harga_jual' => 150000,
                'barang_terjual' => 5,
                'total_pendapatan' => 150000 * 5,
                'total_laba' => (150000 - 100000) * 5
            ],
            [
                'nama_barang' => 'Mie Instan',
                'kategori' => 'Makanan',
                'stok' => 50,
                'harga_modal' => 2500,
                'harga_jual' => 3500,
                'barang_terjual' => 30,
                'total_pendapatan' => 3500 * 30,
                'total_laba' => (3500 - 2500) * 30
            ],
            [
                'nama_barang' => 'Smartphone Samsung',
                'kategori' => 'Elektronik',
                'stok' => 15,
                'harga_modal' => 5000000,
                'harga_jual' => 6000000,
                'barang_terjual' => 4,
                'total_pendapatan' => 6000000 * 4,
                'total_laba' => (6000000 - 5000000) * 4
            ],
            [
                'nama_barang' => 'Celana Jeans',
                'kategori' => 'Pakaian',
                'stok' => 25,
                'harga_modal' => 200000,
                'harga_jual' => 300000,
                'barang_terjual' => 8,
                'total_pendapatan' => 300000 * 8,
                'total_laba' => (300000 - 200000) * 8
            ],
            [
                'nama_barang' => 'Kopi Sachet',
                'kategori' => 'Makanan',
                'stok' => 100,
                'harga_modal' => 1500,
                'harga_jual' => 2500,
                'barang_terjual' => 50,
                'total_pendapatan' => 2500 * 50,
                'total_laba' => (2500 - 1500) * 50
            ],
            [
                'nama_barang' => 'Headset Bluetooth',
                'kategori' => 'Elektronik',
                'stok' => 20,
                'harga_modal' => 200000,
                'harga_jual' => 300000,
                'barang_terjual' => 7,
                'total_pendapatan' => 300000 * 7,
                'total_laba' => (300000 - 200000) * 7
            ],
            [
                'nama_barang' => 'Jaket Hoodie',
                'kategori' => 'Pakaian',
                'stok' => 30,
                'harga_modal' => 250000,
                'harga_jual' => 400000,
                'barang_terjual' => 10,
                'total_pendapatan' => 400000 * 10,
                'total_laba' => (400000 - 250000) * 10
            ],
            [
                'nama_barang' => 'Beras Premium 5kg',
                'kategori' => 'Makanan',
                'stok' => 40,
                'harga_modal' => 60000,
                'harga_jual' => 80000,
                'barang_terjual' => 15,
                'total_pendapatan' => 80000 * 15,
                'total_laba' => (80000 - 60000) * 15
            ],
            [
                'nama_barang' => 'Mouse Gaming',
                'kategori' => 'Elektronik',
                'stok' => 25,
                'harga_modal' => 300000,
                'harga_jual' => 450000,
                'barang_terjual' => 6,
                'total_pendapatan' => 450000 * 6,
                'total_laba' => (450000 - 300000) * 6
            ]
        ];

        foreach ($barangs as $barang) {
            DB::table('barangs')->insert($barang);
        }
    }
}
