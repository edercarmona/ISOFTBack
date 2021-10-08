<?php

namespace App\Http\Controllers;

use App\Models\GasType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;


class GasTypeController extends Controller
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
        $data = $request->only('gas_id','gas_name','gas_description', 'gas_fuel');
        $validator = Validator::make($data, [
            'gas_id' => ['required','string','unique:gas_types'],
            'gas_name' => ['required','string','unique:gas_types'],
            'gas_description' => ['required','string'],
            'gas_fuel' => ['required','integer'],

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        $station = GasType::create([
          'gas_id' => $request->gas_id,
          'gas_name' => $request->gas_name,
          'gas_description' => $request->gas_description,
          'gas_fuel' => $request->gas_fuel,
        ]);

        //User created, return success response
        return response()->json([
            'success' => true,
            'message' => 'Tipo de gasolina creado con exito',
            'data' => $station
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GasType  $gasType
     * @return \Illuminate\Http\Response
     */
    public function show(GasType $gasType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GasType  $gasType
     * @return \Illuminate\Http\Response
     */
    public function edit(GasType $gasType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GasType  $gasType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GasType $gasType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GasType  $gasType
     * @return \Illuminate\Http\Response
     */
    public function destroy(GasType $gasType)
    {
        //
    }
}
