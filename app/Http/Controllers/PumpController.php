<?php

namespace App\Http\Controllers;

use App\Models\Pump;
use Illuminate\Http\Request;
use App\Rules\NumPumpsStation;
use App\Rules\NumPumpsFuel;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class PumpController extends Controller
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
      $data = $request->only('pump_id','pump_station','pump_fuel');
      $validator = Validator::make($data, [
          'name' => ['unique:pumps,pump_id,NULL,'.$request->pump_station.',pump_station,'.$request->pump_station.',pump_fuel,'.$request->pump_fuel.',field3,value3'],
          'pump_id' => ['required','integer'],
          'pump_station' => ['required','integer',new NumPumpsStation($request->pump_station, $request->pump_fuel)],
          'pump_fuel' => ['required','integer'],
      ]);

      if ($validator->fails()) {
          return response()->json(['error' => $validator->messages()], 200);
      }

      $pump = Pump::create([
        'pump_id' => $request->pump_id,
        'pump_station' => $request->pump_station,
        'pump_fuel' => $request->pump_fuel,
      ]);

      //User created, return success response
      return response()->json([
          'success' => true,
          'message' => 'Bomba creada con exito',
          'data' => $pump
      ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pump  $pump
     * @return \Illuminate\Http\Response
     */
    public function show(Pump $pump)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pump  $pump
     * @return \Illuminate\Http\Response
     */
    public function edit(Pump $pump)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pump  $pump
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pump $pump)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pump  $pump
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pump $pump)
    {
        //
    }
}
