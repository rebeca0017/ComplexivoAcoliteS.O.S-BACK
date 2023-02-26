<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function getRoles()
    {
        $roles = Role::where('id', '!=', 1)->get();

        return new JsonResponse([
            'status' => 'success',
            'data' => [
                'roles' => $roles,
            ],
        ], 200);
    }
}
