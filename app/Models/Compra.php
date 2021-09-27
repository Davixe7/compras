<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = ['seller_id'];

    public function seller(){
      return $this->belongsTo('App\Models\Seller');
    }
}
