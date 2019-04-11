<?php

namespace App\Http\Controllers;

use App\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function index()
    {
        return Sponsor::all();
    }

    public function show(Sponsor $sponsor)
    {
        return $sponsor;
    }

    public function store(Request $request)
    {
        $sponsor = Sponsor::create($request->all());

        return response()->json($sponsor, 201);
    }

    public function update(Request $request, Sponsor $sponsor)
    {
        $sponsor->update($request->all());

        return response()->json($sponsor, 200);
    }

    public function delete(Sponsor $sponsor)
    {
        $sponsor->delete();

        return response()->json(null, 204);
    }
}
