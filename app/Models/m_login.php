<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class m_login extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_akun'; // Nama tabel database kamu

    protected $primaryKey = 'id_akun'; // Primary Key di tabel (jika id_akun)
    public $incrementing = false; // Karena id_akun bukan auto increment (contohnya A001, A002)
    protected $keyType = 'string'; // Karena id_akun berbentuk string, bukan integer

    protected $fillable = [
        'id_akun',
        'username',
        'password',
        'tipe_akun',
    ];

    public $timestamps = false; // Karena tb_akun tidak ada created_at / updated_at

    protected $hidden = [
        'password',
    ];
}
