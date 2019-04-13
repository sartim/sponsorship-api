<?php

namespace App\Http\Controllers;

use App\Contribution;
use Illuminate\Http\Request;

class ContributionController extends Controller
{
    /**
     * Retrieve Contributions list
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        $contributions = Contribution::with(['sponsor','child'])->get();
        return $contributions;
    }

    /**
     * Retrieve monthly contributions list by year
     * @return array
     */
    public function monthly() {
        return (new Contribution)->getMonthly();
    }

    /**
     * Retrieve yearly contributions list
     * @return array
     */
    public function yearly() {
        return (new Contribution)->getYearly();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $contribution = Contribution::create($request->all());

        return response()->json($contribution, 201);
    }

    /**
     * @param Request $request
     * @param Contribution $contribution
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Contribution $contribution)
    {
        $contribution->update($request->all());

        return response()->json($contribution, 200);
    }

    /**
     * @param Contribution $contribution
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(Contribution $contribution)
    {
        $contribution->delete();

        return response()->json(null, 204);
    }
}
