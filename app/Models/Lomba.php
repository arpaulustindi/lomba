<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $table = 'lombas';
    protected $fillable = [
        'id',
        'jenis',
        'nama'
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];
}
