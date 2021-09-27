<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
      'seller_type'
    ];

    public function details(){
      if( $this->seller_type == 'persona' ){
        return $this->hasOne('App\Models\Persona');
      }
      return $this->hasOne('App\Models\Empresa');
    }

    public function persona(){
      return $this->hasOne('App\Models\Persona');
    }

    public function empresa(){
      return $this->hasOne('App\Models\Empresa');
    }
}
