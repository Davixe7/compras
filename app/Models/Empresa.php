<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $hidden = [
      'updated_at',
      'created_at',
    ];

    protected $fillable = [
      'ruc',
      'name',
      'address',
      'phone',
      'email',
      'contact',
      'seller_id',
    ];
  
    public function seller(){
      return $this->belongsTo('App\Models\Seller');
    }
}
