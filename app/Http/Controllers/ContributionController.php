<?php

namespace App\Http\Controllers;

use App\Child;
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
     * @param Contribution $contribution
     * @return Contribution
     */
    public function show(Contribution $contribution)
    {
        return $contribution;
    }

    /**
     * Retrieve yearly contributions list
     * @return array
     */
    public function yearly() {
        return (new Contribution)->getYearly();
    }

    /**
     * Retrieve contributions by year
     * @param Request $request
     * @return array
     */
    public function byYear(Request $request)
    {
        $year = $request->query('year');
        return (new Contribution)->getByYear($year);
    }

    /**
     * Retrieve total sum of contributions
     * @return mixed
     */
    public function total()
    {
        return (new Contribution)->getTotal();
    }

    /**
     * Retrieve total sum for the current month
     * @return \Illuminate\Support\Collection
     */
    public function thisMonth()
    {
        return (new Contribution)->getThisMonth();
    }

    public function childContributions(Child $child)
    {
        return (new Contribution)->getchildContributions($child);
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
