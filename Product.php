<<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // mendefinisikan tabel products
    protected $table = 'products';

    // mempersilahkan inputan mana saja yang bisa diinput langsung oleh user
    protected $fillable = ['name','price','type','expired_at'];
}