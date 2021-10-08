<?php

namespace App\Http\Controllers;


use App\Models\Fuel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class FuelController extends Controller
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
      $data = $request->only('fuel_id','fuel_name','fuel_description');
      $validator = Validator::make($data, [
          'fuel_name' => ['required','string','unique:fuels'],
          'fuel_description' => ['required','string'],
      ]);

      if ($validator->fails()) {
          return response()->json(['error' => $validator->messages()], 200);
      }

      $station = Fuel::create([
        'fuel_name' => $request->fuel_name,
        'fuel_description' => $request->fuel_description,
      ]);

      //User created, return success response
      return response()->json([
          'success' => true,
          'message' => 'Tipo de combustible creado con exito',
          'data' => $station
      ], Response::HTTP_OK);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function show(Fuel $fuel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function edit(Fuel $fuel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fuel $fuel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fuel $fuel)
    {
        //
    }
}
