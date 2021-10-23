<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Detail;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class SaleController extends Controller
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
      $data = $request->only('sale_station','sale_pump','sale_operator');
      $validator = Validator::make($data, [
          'sale_station' => ['required','integer'],
          'sale_pump' => ['required','integer'],
          'sale_operator' => ['required','integer'],
      ]);

      if ($validator->fails()) {
          return response()->json(['error' => $validator->messages()], 200);
      }

      $station = Sale::create([
        'sale_station' => $request->sale_station,
        'sale_pump' => $request->sale_pump,
        'sale_operator' => $request->sale_operator,
      ]);

      //User created, return success response
      return response()->json([
          'success' => true,
          'message' => 'Venta creada con exito',
          'data' => $station
      ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show($sale)
    {
      $sale=Sale::where('sale_id', $sale)->first();
      $detail=Detail::where('detail_sale', $sale->sale_id)->first();
      $station = $sale->station;
      $data = [
        'cve_station' => substr(str_repeat(0, 2).$sale->sale_station, - 2),
        'cve_pump' => substr(str_repeat(0, 2).$sale->sale_pump, - 2),
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
      ];

       if (!$sale) {
           return response()->json([
               'success' => false,
               'message' => 'Venta no Encontrada'
           ], 400);
       }

       return $data;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
