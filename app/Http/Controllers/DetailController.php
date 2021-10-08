<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;
use App\Models\Station;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class DetailController extends Controller
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
      $p = DB::table('products')->where('product_id',$request->detail_product)->first();
      $price = $p->product_price;
      $data = $request->only('detail_sale','detail_group','detail_product'
      ,'detail_quantity');
      $validator = Validator::make($data, [
          'detail_sale' => ['required','integer'],
          'detail_group' => ['required','string','max:2'],
          'detail_product' => ['required','integer'],
          'detail_quantity' => ['required','integer'],
      ]);

      if ($validator->fails()) {
          return response()->json(['error' => $validator->messages()], 200);
      }

      $detail = Detail::create([
        'detail_sale' => $request->detail_sale,
        'detail_group' => $request->detail_group,
        'detail_product' => $request->detail_product,
        'detail_quantity' => $request->detail_quantity,
        'detail_price' => $price,
      ]);

      //User created, return success response
      return response()->json([
          'success' => true,
          'message' => 'Estacion creada con exito',
          'data' => $detail
      ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show(Detail $detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail $detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail)
    {
        //
    }
}
