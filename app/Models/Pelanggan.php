<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'alamat',
        'kelurahan',
        'status',
        'tanda_tangan',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
