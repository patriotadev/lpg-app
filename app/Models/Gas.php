<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gas extends Model
{
    use HasFactory;

    protected $table = 'gas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'jenis_gas',
        // Ukuran Berat
        'foto',
        'harga',
        'stok'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
