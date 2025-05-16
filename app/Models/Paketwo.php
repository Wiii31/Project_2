<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketWO extends Model
{
    use HasFactory;

    protected $table = 'paketwo'; // pastikan sesuai dengan nama tabel di migrasi
    protected $fillable = ['nama_paket', 'harga', 'deskripsi'];
}
