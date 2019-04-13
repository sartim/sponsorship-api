<?php

namespace App\Http\Controllers;

use App\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChildController extends Controller
{
    /**
     * Retrieve Children list
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        $children = Child::with(['sponsor.sponsor','gender'])->get();
//        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
//        $out->writeln($children);
        return $children;
    }

    /**
     * Retrieve Child monthly contributions list by year
     * @param Request $request
     * @return array
     */
    public function monthlyContribution(Request $request)
    {
        $child_id = $request->query('child_id');
        $year = $request->query('year');
        $data = (new Child)->getMonthlyContributions($child_id, $year);
        return $data;
    }

    /**
     * Retrieve Child yearly contributions list
     * @param Request $request
     * @return array
     */
    public function yearlyContribution(Request $request)
    {
        $child_id = $request->query('child_id');
        $data = (new Child)->getYearlyContribution($child_id);
        return $data;
    }

    /**
     * Search for Child
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request)
    {
        $search = $request->query('q');
        # TODO Update to Full text search using something like elastic search
        $query = (new Child)->search($search);
        return $query;
    }

    /**
     * Get child by id
     * @param Child $child
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function show(Child $child)
    {
        $r = Child::with(['gender'])->find($child['id']);
        return $r;
    }

    /**
     * Save POST data to create Child
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $child = Child::create($request->all());

        return response()->json($child, 201);
    }

    /**
     * Save PUT data to update child
     * @param Request $request
     * @param Child $child
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Child $child)
    {
        $child->update($request->all());

        return response()->json($child, 200);
    }

    /**
     * Remove DELETE data to delete child
     * @param Child $child
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(Child $child)
    {
        $child->delete();

        return response()->json(null, 204);
    }
}
