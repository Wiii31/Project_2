<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenugasanTim extends Model
{
    protected $table = 'penugasan_tim';
    protected $fillable = ['nama_tim', 'kegiatan_id', 'tugas'];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }
}
