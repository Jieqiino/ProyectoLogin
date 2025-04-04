<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public $successStatus = 200;
    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if(Auth::attempt(['email'=> $request->email,'password'=> $request->password])){
            $usuario = Auth::user();
            //$success['token'] = $usuario->createToken('clockwork')->accessToken;
            return redirect()->to('/profesor/inicio');
        }else{
            return redirect()->to('/');
        }
    }

    public function register(Request $request)
    {
    // Validar los datos recibidos
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required', // Usamos confirmed para comparar con password_confirmation
    ]);

    try {
        // Crear el usuario con la contraseña cifrada
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'edad' => $validatedData['edad'],
            'telefono' => $validatedData['telefono'],
            'direccion' => $validatedData['direccion'],
        ]);

        // Generar un token de acceso
        $token = $user->createToken('MyApp')->accessToken;

        // Preparar la respuesta de éxito
        return response()->json([
            'success' => [
                'token' => $token,
                'name' => $user->name,
            ]
        ], 201); // Código HTTP 201: Creado
    } catch (\Exception $e) {
        // Manejar errores inesperados
        return response()->json([
            'error' => 'No se pudo registrar el usuario.',
            'details' => $e->getMessage(),
        ], 500); // Código HTTP 500: Error interno del servidor
    }
   }
}
