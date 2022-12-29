<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $fillable = [
        'nama',
        'quantity',
        'harga'
    ];

    protected $hidden;

    public function pemasukan()
    {
        return $this->hasOne(Pemasukan::class, 'id_produk');
    }
}
