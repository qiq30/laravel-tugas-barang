<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Tambahkan ini!
        'nama_barang',
        'kategori',
        'stok',
        'harga_modal',
        'harga_jual',
        'barang_terjual',
        'total_pendapatan',
        'total_laba'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
