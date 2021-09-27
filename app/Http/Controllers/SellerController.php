<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Empresa;
use App\Models\Persona;

class SellerController extends Controller
{
  public function index(Request $request){
    if( $request->type == 'empresa' ){
      return view('sellers.empresa-index', ['sellers' => Seller::where('seller_type', 'empresa')->get()]);  
    }
    return view('sellers.persona-index', ['sellers' => Seller::where('seller_type', 'persona')->get()]);
  }

  public function create(){
    return view('sellers.create');
  }

  public function store(Request $request){
    $seller = Seller::create([
      'seller_type' => $request->seller_type
    ]);

    $data = $request->all();
    $data['seller_id'] = $seller->id;

    if( $request->seller_type == 'empresa' ){
      Empresa::create( $data );
    }
    else if( $request->seller_type == 'persona' ){
      Persona::create( $data );
    }

    return redirect()->route('sellers.index')->with(['type'=> $seller->seller_type]);
  }
}
