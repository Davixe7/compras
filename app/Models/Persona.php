<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
  use HasFactory;

  protected $hidden = [
    'updated_at',
    'created_at',
  ];

  protected $fillable = [
    'name',
    'surname',
    'age',
    'gender',
    'seller_id',
  ];

  public function seller(){
    return $this->belongsTo('App\Models\Seller');
  }
}
