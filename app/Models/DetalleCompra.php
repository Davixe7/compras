<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;

    protected $hidden = [
      'created_at',
      'updated_at',
    ];

    protected $fillable = [
      'compra_id',
      'product_id',
      'price',
      'qty',
      'unit'
    ];
}