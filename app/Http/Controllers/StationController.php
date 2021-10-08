<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\MaxPumps;
use App\Rules\PercentDisesel;
use Symfony\Component\HttpFoundation\Response;

class StationController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->only('station_name','station_razon','station_rfc',
      'station_dire','station_mpo', 'station_edo', 'station_cp', 'station_phone'
      ,'station_gas', 'station_diesel');
      $validator = Validator::make($data, [
          'station_name' => ['required','string','unique:stations'],
          'station_razon' => ['required','string'],
          'station_rfc' => ['required','string','min:12','max:12'],
          'station_dire' => ['required','string','max:250'],
          'station_mpo' => ['required','string','max:250'],
          'station_edo' => ['required','string','max:250'],
          'station_cp' => ['required','string','min:5','max:5'],
          'station_phone' => ['required','string','min:10','max:10'],
          'station_gas' => ['required','integer',new MaxPumps($request->station_gas, $request->station_diesel)],
          'station_diesel' => ['required','integer',new PercentDisesel($request->station_gas, $request->station_diesel)],
      ]);

      if ($validator->fails()) {
          return response()->json(['error' => $validator->messages()], 200);
      }

      $station = Station::create([
        'station_name' => $request->station_name,
        'station_razon' => $request->station_razon,
        'station_rfc' => $request->station_rfc,
        'station_dire' => $request->station_dire,
        'station_mpo' => $request->station_mpo,
        'station_edo' => $request->station_edo,
        'station_cp' => $request->station_cp,
        'station_phone' => $request->station_phone,
        'station_gas' => $request->station_gas,
        'station_diesel' => $request->station_diesel,
      ]);

      //User created, return success response
      return response()->json([
          'success' => true,
          'message' => 'Estacion creada con exito',
          'data' => $station
      ], Response::HTTP_OK);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function show(Station $station)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function edit(Station $station)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Station $station)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function destroy(Station $station)
    {
        //
    }
}
