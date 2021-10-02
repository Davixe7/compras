<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Seller as SellerResource;
use App\Models\Compra;
use App\Models\Seller;
use App\Models\Product;

class CompraController extends Controller
{
  public function index()
  {
    $compras = Compra::with('seller')->get();
    return view('compras.index', ['compras' => $compras]);
  }

  public function create()
  {
    $personas = Seller::where('seller_type', 'persona')->with('persona')->get();
    $empresas = Seller::where('seller_type', 'empresa')->with('empresa')->get();
    return view('compras.create', [
      'personas' => SellerResource::collection($personas),
      'empresas' => SellerResource::collection($empresas),
      'products' => Product::all(),
    ]);
  }

  public function store(Request $request)
  {
    $compra = Compra::create([
      'seller_id' => $request->seller_id
    ]);

    $compra->details()->createMany($request->selection);
    return response()->json(['data' => $compra]);
  }
}
