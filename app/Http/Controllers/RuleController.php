<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class RuleController extends Controller
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
      $data = $request->only('rule_id','rule_name',
      'rule_points','rule_liters','rule_active','rule_promotion','rule_description');
      $validator = Validator::make($data, [
          'rule_name' => ['required','string','unique:rules'],
          'rule_points' => ['required','integer'],
          'rule_liters' => ['required','integer'],
          'rule_active' => ['required','boolean','max:250'],
          'rule_promotion' => ['required','integer',],
          'rule_description' => ['required','string','max:250'],
      ]);

      if ($validator->fails()) {
          return response()->json(['error' => $validator->messages()], 200);
      }

      $station = Rule::create([
        'rule_name' => $request->rule_name,
        'rule_points' => $request->rule_points,
        'rule_liters' => $request->rule_liters,
        'rule_active' => $request->rule_active,
        'rule_promotion' => $request->rule_promotion,
        'rule_description' => $request->rule_description
      ]);

      //User created, return success response
      return response()->json([
          'success' => true,
          'message' => 'Regla creada con exito',
          'data' => $station
      ], Response::HTTP_OK);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function show(Rule $rule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function edit(Rule $rule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rule $rule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rule $rule)
    {
        //
    }
}
