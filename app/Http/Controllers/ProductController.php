<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->only('product_name','product_description','product_price','product_group');
      $validator = Validator::make($data, [
          'product_name' => ['required','string'],
          'product_description' => ['required','string','max:255'],
          'product_price' => ['required','regex:/^\d+(\.\d{1,2})?$/',],
          'product_group' => ['required','string','max:2'],
      ]);

      if ($validator->fails()) {
          return response()->json(['error' => $validator->messages()], 200);
      }

      $station = Product::create([
        'product_id' => $request->product_id,
        'product_name' => $request->product_name,
        'product_description' => $request->product_description,
        'product_price' => $request->product_price,
        'product_group' => $request->product_group,
      ]);

      //User created, return success response
      return response()->json([
          'success' => true,
          'message' => 'Producto creado con exito',
          'data' => $station
      ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
