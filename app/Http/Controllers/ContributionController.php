<?php

namespace App\Http\Controllers;

use App\Contribution;
use Illuminate\Http\Request;

class ContributionController extends Controller
{
    public function index()
    {
        return Contribution::all();
    }

    public function show(Contribution $contribution)
    {
        return $contribution;
    }

    public function store(Request $request)
    {
        $contribution = Contribution::create($request->all());

        return response()->json($contribution, 201);
    }

    public function update(Request $request, Gender $contribution)
    {
        $contribution->update($request->all());

        return response()->json($contribution, 200);
    }

    public function delete(Contribution $contribution)
    {
        $contribution->delete();

        return response()->json(null, 204);
    }
}
