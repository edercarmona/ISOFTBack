<?php

namespace App\Http\Controllers;

use App\Models\Taxe;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use App\Rules\RFC;

class TaxeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

      $data = $request->only('taxe_user','taxe_company','taxe_rfc','taxe_email');
      $validator = Validator::make($data, [
          'taxe_user' => ['required','string','email'],
          'taxe_company' => ['required','string'],
          'taxe_rfc' => ['required','string','min:12','max:13',new RFC($request->taxe_rfc)],
          'taxe_email' => ['required','string','email'],
      ]);
      if ($validator->fails()) {
          return response()->json(['error' => $validator->messages()], 200);
      }
      $taxe = taxe::create([
        'taxe_user' => $request->taxe_user,
        'taxe_company' => $request->taxe_company,
        'taxe_rfc' => $request->taxe_rfc,
        'taxe_email' => $request->taxe_email,
      ]);

      //Usuaro creado, se envia respuesta
      return response()->json([
          'success' => true,
          'message' => 'Datos de Facturaccion registradoscon exito',
          'data' => $taxe
      ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Taxe  $taxe
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      $taxe=Taxe::where('taxe_user', $request->user_email)->first();
       if (!$taxe) {
           return response()->json([
               'success' => false,
               'message' => 'Usuario no Encontrado'
           ], 400);
       }

       return $taxe;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Taxe  $taxe
     * @return \Illuminate\Http\Response
     */
    public function edit(Taxe $taxe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Taxe  $taxe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taxe $taxe)
    {
      $data = $request->only('taxe_user','taxe_company','taxe_rfc','taxe_email');
      $validator = Validator::make($data, [
          'taxe_user' => ['required','string','email'],
          'taxe_company' => ['required','string'],
          'taxe_rfc' => ['required','string','min:12','max:13',new RFC($request->taxe_rfc)],
          'taxe_email' => ['required','string','email'],
      ]);
      if ($validator->fails()) {
          return response()->json(['error' => $validator->messages()], 200);
      }
      Taxe::where('taxe_user', $request->taxe_user)
        ->update([
        'taxe_company' => $request->taxe_company,
        'taxe_rfc' => $request->taxe_rfc,
        'taxe_email' => $request->taxe_email,]);

      //Usuaro creado, se envia respuesta
      return response()->json([
          'success' => true,
          'message' => 'Datos de Facturaccion registradoscon exito',
          'data' => $data
      ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taxe  $taxe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taxe $taxe)
    {
        //
    }
}
