<?php

namespace App\Http\Controllers;

use App\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function index()
    {
        return UserRole::all();
    }

    public function show(UserRole $userRole)
    {
        return $userRole;
    }

    public function store(Request $request)
    {
        $userRole = UserRole::create($request->all());

        return response()->json($userRole, 201);
    }

    public function update(Request $request, UserRole $userRole)
    {
        $userRole->update($request->all());

        return response()->json($userRole, 200);
    }

    public function delete(UserRole $userRole)
    {
        $userRole->delete();

        return response()->json(null, 204);
    }
}
