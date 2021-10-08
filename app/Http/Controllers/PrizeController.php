<?php

namespace App\Http\Controllers;

use App\Models\Prize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class PrizeController extends Controller
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
      $data = $request->only('prize_id','prize_name','prize_points','prize_promotion','prize_active','prize_stock','prize_description');
      $validator = Validator::make($data, [
          'prize_name' => ['required','string','unique:prizes'],
          'prize_points' => ['required','integer'],
          'prize_promotion' => ['required','integer'],
          'prize_active' => ['required','boolean'],
          'prize_stock' => ['required','integer'],
          'prize_description' => ['required','string','max:255'],
      ]);

      if ($validator->fails()) {
          return response()->json(['error' => $validator->messages()], 200);
      }

      $station = Prize::create([
        'prize_name' => $request->prize_name,
        'prize_points' => $request->prize_points,
        'prize_promotion' => $request->prize_promotion,
        'prize_active' => $request->prize_active,
        'prize_stock' => $request->prize_stock,
        'prize_description' => $request->prize_description,
      ]);

      //User created, return success response
      return response()->json([
          'success' => true,
          'message' => 'Premio creado con exito',
          'data' => $station
      ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prize  $prize
     * @return \Illuminate\Http\Response
     */
    public function show(Prize $prize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prize  $prize
     * @return \Illuminate\Http\Response
     */
    public function edit(Prize $prize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prize  $prize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prize $prize)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prize  $prize
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prize $prize)
    {
        //
    }
}
