<?php

namespace App\Http\Controllers;


use App\Models\Win;
use App\Models\Point;
use App\Models\User;
use App\Models\Promotion;
use App\Models\Prize;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class WinController extends Controller
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
    public function store()
    {
      $now = date('Y-m-d');
      $promotion=Promotion::where('promotion_active', 1)
      ->where('promotion_startdate','<=', $now)
      ->where('promotion_enddate','>=', $now)
      ->get();
      if (!$promotion) {
          return response()->json([
              'success' => false,
              'message' => 'No existen promociones vigentes'
          ], 400);
      }else{
        $points=Point::where('point_promotion', $promotion[0]['promotion_id'])
        ->where('point_status', 1)
        ->get();
         foreach($points as $values)
         {
              $prize=Prize::where('prize_points', '<=' ,$values->point_cant)
                ->orderBy('prize_points', 'desc')
                ->first();
                if (!$prize) {
                  Point::where('point_user', $values->point_user)
                        ->where('point_promotion',  $promotion[0]['promotion_id'])
                        ->update(['point_status' => 0]);
                  return response()->json([
                      'success' => false,
                      'message' => 'Puntos insuficientes'
                  ], 400);
                }else{
              echo $prize->prize_description. "\n";
              $win = Win::create([
                'win_promotion' =>  $promotion[0]['promotion_id'],
                'win_user' =>$values->point_user,
                'win_prize' => $prize->prize_id,
                'win_status' => 1,
              ]);
              Point::where('point_user', $values->point_user)
                    ->where('point_promotion',  $promotion[0]['promotion_id'])
                    ->update(['point_status' => 0]);

              return response()->json([
                  'success' => true,
                  'message' => 'Ticket registrtado con exito!!! ',
                  'data' => $win
              ], Response::HTTP_OK);
            }
         }
      //  return $points;
      }
    }

    public function store2()
    {
      $now = date('Y-m-d');
      $promotion=Promotion::where('promotion_active', 1)
      ->where('promotion_startdate','<=', $now)
      ->where('promotion_enddate','>=', $now)
      ->get();
      if (!$promotion) {
          return response()->json([
              'success' => false,
              'message' => 'No existen promociones vigentes'
          ], 400);
      }else{
        $points=Point::where('point_promotion', $promotion[0]['promotion_id'])
        ->where('point_status', 1)
        ->get();
         foreach($points as $values)
         {
              $prize=Prize::where('prize_points', '<=' ,$values->point_cant)
                ->orderBy('prize_points', 'desc')
                ->first();
                if (!$prize) {
                  Point::where('point_user', $values->point_user)
                        ->where('point_promotion',  $promotion[0]['promotion_id'])
                        ->update(['point_status' => 0]);
                  return response()->json([
                      'success' => false,
                      'message' => 'Puntos insuficientes'
                  ], 400);
                }else{
              echo $prize->prize_description. "\n";
              $win = Win::create([
                'win_promotion' =>  $promotion[0]['promotion_id'],
                'win_user' =>$values->point_user,
                'win_prize' => $prize->prize_id,
                'win_status' => 1,
              ]);
              Point::where('point_user', $values->point_user)
                    ->where('point_promotion',  $promotion[0]['promotion_id'])
                    ->update(['point_status' => 0]);

              return response()->json([
                  'success' => true,
                  'message' => 'Ticket registrtado con exito!!! ',
                  'data' => $win
              ], Response::HTTP_OK);
            }
         }
      //  return $points;
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Win  $win
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      $data = $request->only('user_email');
      $validator = Validator::make($data, [
          'user_email' => 'required|email',
      ]);
      //enviando mensaje si la validacion falla
      if ($validator->fails()) {
          return response()->json(['error' => $validator->messages()], 200);
      }
      $win=Win::where('win_user', $request->user_email)
      ->where('win_status', 1)
      ->with('prize')
      ->get();
      if (!$win) {
          return response()->json([
              'success' => false,
              'message' => 'Usario no tiene premios'
          ], 400);
      }else{
          return $win;
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Win  $win
     * @return \Illuminate\Http\Response
     */
    public function edit(Win $win)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Win  $win
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Win $win)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Win  $win
     * @return \Illuminate\Http\Response
     */
    public function destroy(Win $win)
    {
        //
    }
}
