<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    protected $fillable = ['user_id', 'paketwo_id', 'tanggal_pesan', 'status'];
}
