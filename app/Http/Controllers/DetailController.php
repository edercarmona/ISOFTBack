<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;
use App\Models\Station;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Product;

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
    public function show($sale)
    {
        $details=Detail::where('detail_sale', $sale)->with('product')->get();

      /*  $data = [
          'cve_product' => substr(str_repeat(0, 2).$detail->detail_product, - 2)."-".$detail->detail_group."-".$product->product_name,
          'description' => $product->product_description,
          'cantidad' => $detail->detail_quantity,
          'price' => $detail->detail_price,


        /*'cve_pump' => substr(str_repeat(0, 2).$sale->sale_pump, - 2),
          'cve_fuel' => $detail->detail_group.substr(str_repeat(0, 3).$sale->sale_pump, - 3),
          'cve_operator'=> $sale->sale_operator,
          'company'=> $station->station_razon,
          'dir'=> $station->station_dire,
          'mpo'=> $station->station_mpo,
          'edo'=> $station->station_edo,
          'cp'=> $station->station_cp,
          'rfc'=> $station->station_rfc,
          'unidad' => substr(str_repeat(0, 2).$station->station_id, - 2)."-".$station->station_name,
          'date' => date_format(date_create(substr($sale->created_at, 0, 10)),"d M Y")." / ".substr($sale->created_at, 11, 8),
          'pump' => substr(str_repeat(0, 2).$sale->sale_station, - 2).".".substr(str_repeat(0, 2).$sale->sale_pump, - 2).
          ".". $detail->detail_group.substr(str_repeat(0, 3).$sale->sale_pump, - 3),
        ];*/

        /*if (!$sale) {
            return response()->json([
                'success' => false,
                'message' => 'Venta no Encontrada'
            ], 400);
        }*/

        return $details;
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
