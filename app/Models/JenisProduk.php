<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisProduk extends Model
{
    use HasFactory;

    protected $table = 'jenis_produks';

    protected $fillable = [
        'nama_jenis',
        'created_by_name',
        'created_by_email',
    ];
}
