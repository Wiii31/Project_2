<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class m_register extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_akun';

    public $timestamps = false; 

    protected $fillable = [
        'id_akun',
        'username',
        'password',
        'nama',
        'tipe_akun',
    ];

}
