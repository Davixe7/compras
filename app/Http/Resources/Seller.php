<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Seller extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
      $data = parent::toArray($request);

      $data['id']           = $this->id;
      $data['seller_type']  = $this->seller_type;
      $data['details']      = $this->seller_type == 'persona' ? $this->persona : $this->empresa;
      $data['name']         = $this->seller_type == 'persona'
                                ? $this->persona->name . ' - ' . $this->persona->dni
                                : $this->empresa->name . ' - ' . $this->empresa->ruc;
      return $data;
    }
}