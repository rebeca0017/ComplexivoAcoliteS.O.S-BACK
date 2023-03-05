<?php


namespace App\Http\Controllers\Auth;
header("Access-Control-Allow-Headers: Authorization");
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\DB;



class AuthController extends Controller
{
    public function Register(Request $request)
    {
        DB::transaction(
            function () use ($request) {
                $user = User::create([
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'name' => $request->name
                ]);
                $user->assignRole($request->role);
            }
        );
        return new JsonResponse([
            'status' => 'success',
            'message' => 'Registro Exitoso'
        ], 200);
    }
    public function Login(Request $request)
    {
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

    public function getProfile()
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }

        return new JsonResponse([
            'status' => 'success',
            'data' => [
                'user' => $user
            ],
        ], 200);
    }
}
