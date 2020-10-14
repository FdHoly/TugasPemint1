<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index()
   {
       $products = product::all();
       return $products;
   } 
   public function show($id)
   {
       $product = product::find($id);
       if ($product){
       return $product;
    }  else {
    return response()->json([
        'message' => 'Produk tidak ditemukan'
    ],404);
        
    }
   } 
   public function store (Request $request)
   {
       $product = product::create([
        'nama' => $request->nama,
        'price' => $request->price, 
        'rating' => $request->rating, 
        'quantity' => $request->quantity
       ]);
       if($product){
        return response()->json([
            'message' => 'Produk berhasil ditambahkan'
        ], 200);
       }
       else {
        return response()->json([
            'message' => 'Produk gagal ditambahkan'
        ],401);
       }
   }
   public function destroy($id)
   {
       $products = product::find($id);
       $product = product::create([
        'nama' => $request->nama,
        'price' => $request->price, 
        'rating' => $request->rating, 
        'quantity' => $request->quantity
       ]);
       if ($products){
        $products->destroy($id);
     return response()->json([
        'message' => 'Produk berhasil dihapus'
    ],200);
    }  
    else {
    return response()->json([
        'message' => 'Produk tidak ditemukan'
    ],404);
        
    }
   
}

    public function update(Request $request, $id)
   {
       $product = product::whereid($id)->update([
        'nama' => $request->nama,
        'price' => $request->price, 
        'rating' => $request->rating, 
        'quantity' => $request->quantity
       ]);
       if($product){
        return response()->json([
            'message' => 'Produk berhasil diupdate'
        ], 200);
       }
       else {
        return response()->json([
            'message' => 'Produk gagal diupdate'
        ],401);
       }
   
}

}

