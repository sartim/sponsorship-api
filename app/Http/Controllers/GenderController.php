<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenderController extends Controller
{
    public function index()
    {
        return Gender::all();
    }

    public function show(Gender $gender)
    {
        return $gender;
    }

    public function store(Request $request)
    {
        $gender = Gender::create($request->all());

        return response()->json($gender, 201);
    }

    public function update(Request $request, Gender $gender)
    {
        $gender->update($request->all());

        return response()->json($gender, 200);
    }

    public function delete(Gender $gender)
    {
        $gender->delete();

        return response()->json(null, 204);
    }
}
