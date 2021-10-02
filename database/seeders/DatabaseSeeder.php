<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Persona;
use App\Models\Empresa;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Seller::create([
          'seller_type' => 'persona'
        ]);

        Seller::create([
          'seller_type' => 'empresa'
        ]);

        Persona::create([
          'name'    => 'John',
          'surname' => 'Doe',
          'age'     => 32,
          'gender'  => 'm',
          'seller_id' => 1
        ]);

        Empresa::create([
          'ruc'     => '1234567',
          'name'    => 'Empresa 01',
          'contact' => 'John Doe',
          'phone'   => '3211231234',
          'address' => 'Avenida DEF Kilometro 32, Local 789',
          'email'   => 'empresa01@gmail.com',
          'seller_id' => 2
        ]);

        Product::create([
          'name'  => 'Agua 250ml',
          'price' => 100
        ]);
        
        Product::create([
          'name'  => 'Agua 500ml',
          'price' => 450
        ]);
        
        Product::create([
          'name'  => 'Refresco 250ml',
          'price' => 150
        ]);
    }
}
