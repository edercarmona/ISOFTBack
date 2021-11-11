<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Sale;
use App\Models\Detail;
use App\Models\Point;
use Illuminate\Http\Request;
use App\Models\Promotion;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
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
        $now=date('Y-m-d');
        $data = $request->only('ticket_id','user_email');
        $validator = Validator::make($data, [
            'ticket_id' => ['required','string','unique:tickets','min:36','max:36'],
        ]);
        $station= substr($request->ticket_id, 0, 2);
        $pump= substr($request->ticket_id, 2, 2);
        $fuel=substr($request->ticket_id, 4, 2);
        $subpump=substr($request->ticket_id, 6, 3);
        $operator=substr($request->ticket_id, 9, 5);
        $date=substr($request->ticket_id, 14, 11);
        $time=substr($request->ticket_id, 28, 8);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }else if(date_format(date_create($date),"m") != date('m')) {
            return response()->json(['error' => "Ticket no corresponde al mes actual"], 200);
        }else if(date_format(date_create($date),"Y-m-d") > date('Y-m-d')) {
            return response()->json(['error' => "Ticket con fecha incorrecta"], 200);
        }

        /* 0404MG0041252503 Oct 2021 / 01:28:58 */

        $sale=Sale::where('sale_station', intval($station))
        ->where('sale_pump', intval($pump))
        ->where('sale_operator', intval($operator))
        ->where('created_at',date_format(date_create($date),"Y-m-d")." ".$time)
        ->with(['detail' => function($query){
                $query->whereRaw('detail_product'.' BETWEEN  1 and 3');
          }])
        ->first();
        if (!$sale) {
            return response()->json([
              'error' => 'Ticket no encontrado'
            ], 400);
        }
        $detail=$sale['detail'];
        if($detail[0]['detail_product']== 1 || $detail[0]['detail_product'] == 2 || $detail[0]['detail_product'] == 3){

        $promotion=Promotion::where('promotion_active', 1)
        ->where('promotion_startdate','<=', $now)
        ->where('promotion_enddate','>=', $now)
        ->get();
        $rule=$promotion[0]['rule'];
        $points = $rule[0]['rule_points'];
        $liters =  $rule[0]['rule_liters'];
        $aux = $detail[0]['detail_quantity'] / $liters;
        $total = $aux * $points;

          $ticket = Ticket::create([
          'ticket_id' => $request->ticket_id,
          'ticket_promotion' => $promotion[0]['promotion_id'],
          'ticket_sale' => $sale['sale_id'],
          'ticket_user' => $request->user_email,
          'ticket_points' => intval($total),
          'ticket_active' => 1,
        ]);

        $point=Point::where('point_promotion', $promotion[0]['promotion_id'])
        ->where('point_user', $request->user_email)
        ->where('point_status', 1)
        ->get();

        if (count($point)==0) {
          $point = Point::create([
            'point_promotion' =>  $promotion[0]['promotion_id'],
            'point_user' => $request->user_email,
            'point_cant' => intval($total),
            'point_status' => 1,
          ]);
        }else{
          $aux2 = $point[0]['point_cant'] + intval($total);
          Point::where('point_user', $request->user_email)
                ->where('point_promotion',  $promotion[0]['promotion_id'])
                ->update(['point_cant' => $aux2]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Ticket registrtado con exito!!! '.intval($total)." Puntos acumulados",
            'data' => $ticket
        ], Response::HTTP_OK);

      }else{
            return response()->json(['error' => "Ticket no contiene consumo de combustible"], 200);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
