<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanggal extends Model
{
    protected $table = 'tanggal';
    protected $fillable = ['tanggal', 'keterangan'];
}
