<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_vendor extends Model
{
    protected $table = 'vendors';

    // Matikan fitur created_at dan updated_at otomatis
    public $timestamps = false;

    protected $fillable = [
        'status',
        'name',
        'category',
        'location',
        'price_start',
        'description',
        'image_url'
    ];
}
