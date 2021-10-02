<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $hidden = [
      'created_at',
      'updated_at',
    ];

    protected $fillable = [
      'seller_type'
    ];

    public function details(){
      if( $this->seller_type == "empresa"){
        return $this->empresa();
      }
      return $this->persona();
    }

    public function persona(){
      return $this->hasOne('App\Models\Persona');
    }

    public function empresa(){
      return $this->hasOne('App\Models\Empresa');
    }
}
