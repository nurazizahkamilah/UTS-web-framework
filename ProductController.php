<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; //library untuk memvalidasi inputan
use App\Models\Product; //memanggil model product

class ProductController extends Controller
{
    public function store(Request $request){
        
        //melakukan valdasi inputan
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:1000',
            'price' => 'required|numeric',
            'type' => 'required|in:makanan,minuman,makeup',
            'expired_at' => 'required|date'
        ]);

        //kondisi inputan salah
        if($validator->fails()) {
            return response()->json($validator->messages())->setStatusCode(422);
        }
        
        //inputan yang sudah benar
        $validated = $validator->validated();

        //input ke tabel products
        Product::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'type' => $validated['type'],
            'expired_at' => $validated['expired_at']
        ]);

        return response()->json('produk berhasil disimpan')->setStatusCode(201);
    }
}