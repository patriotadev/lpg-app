<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjang';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'jenis_gas',
        'jumlah',
        'tanggal',
        'status_pembelian'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
