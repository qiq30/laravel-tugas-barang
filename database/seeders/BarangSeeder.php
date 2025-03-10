<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil ID user pertama atau buat jika belum ada
        $user = DB::table('users')->first();
        if (!$user) {
            $userId = DB::table('users')->insertGetId([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
            ]);
        } else {
            $userId = $user->id;
        }

        // Insert 10 data barang
        DB::table('barangs')->insert([
            [
                'nama_barang' => 'Laptop ASUS',
                'kategori' => 'Elektronik',
                'stok' => 10,
                'harga_modal' => 7000000,
                'harga_jual' => 8500000,
                'barang_terjual' => 3,
                'total_pendapatan' => 25500000,
                'total_laba' => 4500000,
                'user_id' => $userId,
            ],
            [
                'nama_barang' => 'Mouse Logitech',
                'kategori' => 'Aksesoris Komputer',
                'stok' => 25,
                'harga_modal' => 150000,
                'harga_jual' => 200000,
                'barang_terjual' => 5,
                'total_pendapatan' => 1000000,
                'total_laba' => 250000,
                'user_id' => $userId,
            ],
            [
                'nama_barang' => 'Headset Razer',
                'kategori' => 'Aksesoris Gaming',
                'stok' => 15,
                'harga_modal' => 900000,
                'harga_jual' => 1200000,
                'barang_terjual' => 4,
                'total_pendapatan' => 4800000,
                'total_laba' => 1200000,
                'user_id' => $userId,
            ],
            [
                'nama_barang' => 'Monitor Samsung 24"',
                'kategori' => 'Elektronik',
                'stok' => 8,
                'harga_modal' => 2000000,
                'harga_jual' => 2500000,
                'barang_terjual' => 2,
                'total_pendapatan' => 5000000,
                'total_laba' => 1000000,
                'user_id' => $userId,
            ],
            [
                'nama_barang' => 'Keyboard Mechanical',
                'kategori' => 'Aksesoris Komputer',
                'stok' => 12,
                'harga_modal' => 750000,
                'harga_jual' => 950000,
                'barang_terjual' => 6,
                'total_pendapatan' => 5700000,
                'total_laba' => 1200000,
                'user_id' => $userId,
            ],
            [
                'nama_barang' => 'Printer Epson L3210',
                'kategori' => 'Elektronik',
                'stok' => 5,
                'harga_modal' => 2200000,
                'harga_jual' => 2700000,
                'barang_terjual' => 3,
                'total_pendapatan' => 8100000,
                'total_laba' => 1500000,
                'user_id' => $userId,
            ],
            [
                'nama_barang' => 'Flashdisk Sandisk 32GB',
                'kategori' => 'Penyimpanan Data',
                'stok' => 30,
                'harga_modal' => 60000,
                'harga_jual' => 90000,
                'barang_terjual' => 10,
                'total_pendapatan' => 900000,
                'total_laba' => 300000,
                'user_id' => $userId,
            ],
            [
                'nama_barang' => 'SSD Kingston 500GB',
                'kategori' => 'Penyimpanan Data',
                'stok' => 10,
                'harga_modal' => 700000,
                'harga_jual' => 850000,
                'barang_terjual' => 5,
                'total_pendapatan' => 4250000,
                'total_laba' => 750000,
                'user_id' => $userId,
            ],
            [
                'nama_barang' => 'Router TP-Link',
                'kategori' => 'Jaringan',
                'stok' => 20,
                'harga_modal' => 350000,
                'harga_jual' => 450000,
                'barang_terjual' => 8,
                'total_pendapatan' => 3600000,
                'total_laba' => 800000,
                'user_id' => $userId,
            ],
            [
                'nama_barang' => 'Webcam Logitech C920',
                'kategori' => 'Aksesoris Komputer',
                'stok' => 7,
                'harga_modal' => 1200000,
                'harga_jual' => 1500000,
                'barang_terjual' => 2,
                'total_pendapatan' => 3000000,
                'total_laba' => 600000,
                'user_id' => $userId,
            ],
        ]);
    }
}
