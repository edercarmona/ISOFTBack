<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function register(Request $request)
    {
    	//Validando Datos
        $data = $request->only('user_name', 'user_email', 'user_password', 'user_phone', 'user_dire');
        $validator = Validator::make($data, [
            'user_name' => 'required|string',
            'user_email' => 'required|email|unique:users',
            'user_password' => 'required|string|min:6|max:50',
            'user_phone' => 'required|string|min:10|max:10',
            'user_dire' => 'required|string|min:6|max:250'
        ]);

        //enviando mensaje si la validacion falla
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //si pasa la validacion se crea el usuario
        $user = User::create([
        	'user_name' => $request->user_name,
        	'user_email' => $request->user_email,
        	'user_password' => bcrypt($request->user_password),
          'user_phone' => $request->user_phone,
          'user_dire' => $request->user_dire,
        ]);

        //Usuaro creado, se envia respuesta
        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'data' => $user
        ], Response::HTTP_OK);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('user_email', 'user_password');

        //valid credential
        $validator = Validator::make($credentials, [
            'user_email' => 'required|email',
            'user_password' => 'required|string'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is validated
        //Crean token
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json([
                	'success' => false,
                	'message' => 'Por favor verifica tu email o contraseña ',
                ], 400);
            }
        } catch (JWTException $e) {
    	return $credentials;
            return response()->json([
                	'success' => false,
                	'message' => 'Could not create token.',
                ], 500);
        }

 		//Token created, return with success response and jwt token
        return response()->json([
            'success' => true,
            'token' => $token,
        ]);
    }

    public function logout(Request $request)
    {
        $validator = Validator::make($request->only('token'), [
            'token' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => 'User has been logged out'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function get_user(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
        $user = JWTAuth::authenticate($request->token);
        return response()->json(['user' => $user]);
    }


    public function show(Request $request)
    {
      $user=User::where('user_email', $request->user_email)->first();
       if (!$user) {
           return response()->json([
               'success' => false,
               'message' => 'Usuario no Encontrado'
           ], 400);
       }

       return $user;
    }
    public function update(Request $request)
    {
    	//Validando Datos
        $data = $request->only('user_name', 'user_email', 'user_password', 'user_phone', 'user_dire');
        $validator = Validator::make($data, [
            'user_name' => 'required|string',
            'user_email' => 'required|email',
            'user_password' => 'string|min:6|max:50',
            'user_phone' => 'required|string|min:10|max:10',
            'user_dire' => 'required|string|min:6|max:250'
        ]);

        //enviando mensaje si la validacion falla
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //si pasa la validacion se actualiza  el usuario
        User::where('user_email', $request->user_email)
          ->update(['user_name' => $request->user_name,
        	         'user_password' => bcrypt($request->user_password),
                  'user_phone' => $request->user_phone,
                  'user_dire' => $request->user_dire,]);

        //Usuaro creado, se envia respuesta
        return response()->json([
            'success' => true,
            'message' => 'User updated successfully',
            'data' => $data
        ], Response::HTTP_OK);
    }
}
