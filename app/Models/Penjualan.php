<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'pembeli',
        'status',
        'alamat',
        'jenis_gas',
        'jumlah_pembelian',
        'tanggal_pembelian',
        'status_pembelian',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
