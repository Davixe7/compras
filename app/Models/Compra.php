<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $hidden = [
      'created_at',
      'updated_at'
    ];

    protected $fillable = ['seller_id'];

    public function seller(){
      return $this->belongsTo('App\Models\Seller');
    }

    public function details(){
      return $this->hasMany('App\Models\DetalleCompra');
    }

    public function getTotalAttribute(){
      return $this->details->reduce(function($subtotal, $product){
        return $subtotal + ($product->price * $product->qty);
      }, 0);
    }
}