<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'departament' => 'required',
            'phone' => 'required|integer',
            'status' => 'required',
            'token' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            Log::channel('errores')->error('Error en las validaciones');
            return response()->json([
                "status" => 400,
                "message" => "Error en las validaciones",
                "error" => [$validator->errors()],
                "data" => []
            ], 400);
        }

        

        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'departament' => $request->departament,
            'phone' => $request->phone,
            'status' => $request->status,
            'token' => $request->token,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            "status" => 201,
            "message" => "Usuario creado",
        ], 201);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:250|email',
            'password' => 'required|max:250',
        ]);
        if ($validator->fails()) {
            Log::channel('errores')->error('Error en las validaciones');
            return response()->json([
                "status" => 400,
                "message" => "Error en las validaciones",
                "error" => [$validator->errors()],
                "data" => []
            ], 400);
        }
        $user = User::where('email', $request['email'])->firstOrFail();
        if (!is_null($user) && Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 200,
                'user_id' => $user->id,
                'user_name' => $user->name,
            ], 200);
        } else {
            Log::channel('errores')->error('Credenciales erroneas');
            return response()->json([
                'message' => 'Credenciales no correctas'
            ], 400);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        Log::channel('slackInfo')->info('Alguien ha cerrado sesión');
        return response()->json([
            "status" => 200,
            "msg" => "Sesión cerrada"
        ]);
    }
}