<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Rules\Date;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;


class PromotionController extends Controller
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
      $ldate = date('Ymd');
      $data = $request->only('promotion_id','promotion_name',
      'promotion_description','promotion_startdate','promotion_enddate','promotion_active');
      $validator = Validator::make($data, [
          'promotion_name' => ['required','string','unique:promotions'],
          'promotion_description' => ['required','string'],
          'promotion_startdate' => ['required','date','after_or_equal:'.$ldate],
          'promotion_enddate' => ['required','date','after:'.$request->promotion_startdate,
          'after:promotion_startdate','after_or_equal:'.$ldate],
          'promotion_active' => ['required','boolean'],
      ]);

      if ($validator->fails()) {
          return response()->json(['error' => $validator->messages()], 200);
      }

      $promotion = Promotion::create([
        'promotion_name' => $request->promotion_name,
        'promotion_description' => $request->promotion_description,
        'promotion_startdate' => $request->promotion_startdate,
        'promotion_enddate' => $request->promotion_enddate,
        'promotion_active' => $request->promotion_active,
      ]);

      //User created, return success response
      return response()->json([
          'success' => true,
          'message' => 'Promocion creada con exito',
          'data' => $promotion
      ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
          $now = date('Y-m-d');
          $promotion=Promotion::where('promotion_active', 1)
          ->where('promotion_startdate','<=', $now)
          ->where('promotion_enddate','>=', $now)
          ->with(['prize' => function($query){
                $query->where('prize_active', 1)
                ->where('prize_stock', '>' ,0);
          }])
          ->with(['rule' => function($query){
                  $query->where('rule_active', 1);
            }])
          ->get();
          if (!$promotion) {
              return response()->json([
                  'success' => false,
                  'message' => 'No existen promociones vigentes'
              ], 400);
          }

          return $promotion;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        //
    }
}
