<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;
use App\Models\Prize;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class PointController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Point  $point
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
        $point=Point::where('point_user', $request->user_email)
        ->where('point_status', 1)
        ->first();

        if (!$point) {
            return response()->json([
                'success' => false,
                'message' => 'Usario no tiene puntos registrados'
            ], 400);
        }else{
          $points = $point->point_cant;
          $prize=Prize::where('prize_points', '<=' ,$points)
            ->orderBy('prize_points', 'desc')
            ->first();
          if (!$prize) {
            $win= "Aun no haz ganado";
          }else{
              $win= $prize->prize_description;
          }
          $prize2=Prize::where('prize_points', '>' ,$points)
            ->orderBy('prize_points', 'asc')
            ->first();
          if (!$prize2) {
            $points2 = $points;
          }else{
            $points2 = $prize2->prize_points;
          }
        }

        $data =[
          'points' => $points,
          'prize' => $win,
          'points2' => $points2,
          'add' => $points2 -$points,
          'percentage' => intval(($points / $points2) *100),
        ];
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function edit(Point $point)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Point $point)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function destroy(Point $point)
    {
        //
    }
}
