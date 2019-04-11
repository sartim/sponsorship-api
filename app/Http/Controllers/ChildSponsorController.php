<?php

namespace App\Http\Controllers;

use App\ChildSponsor;
use Illuminate\Http\Request;

class ChildSponsorController extends Controller
{
    public function index()
    {
        return ChildSponsor::all();
    }

    public function show(ChildSponsor $childSponsor)
    {
        return $childSponsor;
    }

    public function store(Request $request)
    {
        $childSponsor = ChildSponsor::create($request->all());

        return response()->json($childSponsor, 201);
    }

    public function update(Request $request, ChildSponsor $childSponsor)
    {
        $childSponsor->update($request->all());

        return response()->json($childSponsor, 200);
    }

    public function delete(ChildSponsor $childSponsor)
    {
        $childSponsor->delete();

        return response()->json(null, 204);
    }
}
