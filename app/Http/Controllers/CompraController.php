<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Seller;

class CompraController extends Controller
{
  public function index(){
    return view('compras.index', ['compras' => Compra::with('seller')->get()]);
  }

  public function create(){
    $personas = Seller::whereHas('persona')->get();
    $empresas = Seller::whereHas('empresa')->get();
    return view('compras.create', [
      'personas' => $personas,
      'empresas' => $empresas,
    ]);
  }

  public function store(Request $request){
    $compra = Compra::create([
      'seller_id' => $request->seller_id
    ]);

    return redirect()->route('compras.index');
  }
}
