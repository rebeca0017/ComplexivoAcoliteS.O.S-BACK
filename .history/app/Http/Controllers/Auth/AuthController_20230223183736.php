<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function Register(Request $request){
        
        $user=User::create(['email'=>$request->email,'password'=>bcrypt($request->password),'name'=>$request->name]);

        return new JsonResponse([
            'status' => 'success',
            'data' => [
                'users' => $user
            ],
            'message' => 'Registro Exitoso'
        ], 200);
    }
    public function Login(Request $request){
        try {
            $user = User::where('email', $request->email)->firstOrFail();
            if (!Hash::check($request->password, $user->password)) {
                throw new \Exception('Credenciales inválidas');
            }

            $accessToken = JWTAuth::fromUser($user);
            return new JsonResponse([
                'status' => 'success',
                'data' => [
                    'accessToken' => $accessToken
                ],
                'message' => 'Inicio de sesión exitoso'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return new JsonResponse([
                'status' => 'error',
                'message' => 'Credenciales inválidas',
            ], 404);
        } catch (\Exception $e) {
            return new JsonResponse([
                'status' => 'error',
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'errors' => []
            ], 401);
        }
    
    }
}
