<?php

namespace App\Http\Controllers;

use App\Models\ProductGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ProductGroupController extends Controller
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
      $data = $request->only('group_id','group_name','group_supply');
      $validator = Validator::make($data, [
          'group_id' => ['required','string','unique:product_groups','max:2'],
          'group_name' => ['required','string','unique:product_groups'],
          'group_supply' => ['required','integer'],
      ]);

      if ($validator->fails()) {
          return response()->json(['error' => $validator->messages()], 200);
      }

      $station = ProductGroup::create([
        'group_id' => $request->group_id,
        'group_name' => $request->group_name,
        'group_supply' => $request->group_supply,
      ]);

      //User created, return success response
      return response()->json([
          'success' => true,
          'message' => 'Categoria de Productos creado con exito',
          'data' => $station
      ], Response::HTTP_OK);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductGroup  $productGroup
     * @return \Illuminate\Http\Response
     */
    public function show(ProductGroup $productGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductGroup  $productGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductGroup $productGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductGroup  $productGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductGroup $productGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductGroup  $productGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductGroup $productGroup)
    {
        //
    }
}
