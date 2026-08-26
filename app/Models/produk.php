<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Jenis;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'user_id',
        'jenis_id',
        'nama',
        'harga_beli',
        'harga_jual',
        'stok',
        'foto',
    ];

    /**
     * Relasi Produk ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi Produk ke Jenis Produk
     */
    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }
}
