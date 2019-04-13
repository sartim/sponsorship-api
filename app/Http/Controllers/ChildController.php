<?php

namespace App\Http\Controllers;

use App\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChildController extends Controller
{
    public function index()
    {
        $children = Child::with(['sponsor.sponsor','gender'])->get();
//        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
//        $out->writeln($children);
        return $children;
    }

    public function yearlyContribution(Request $request) {
        $child_id = $request->query('child_id');
        $data = DB::table('contributions')
            ->select(DB::raw("SUM(contribution) as contribution, extract(year from created_at) AS year"))
            ->whereRaw('child_id = ?',[$child_id])
            ->groupBy(DB::raw("year"))
            ->get();

        $output = array();
        foreach($data as $obj){
            array_push($output, array(
                    'year' =>intval($obj->year),
                    'contribution' => intval($obj->contribution)
                )
            );

        }
        return $output;
    }

    public function search(Request $request)
    {
        $search = $request->query('q');
        # TODO Update to Full text search using something like elastic search
        $query= Child::query()
            ->with(['gender'])
            ->whereLike('first_name', $search)
            ->whereLike('last_name', $search)
            ->get();
        return $query;
    }

    public function show(Child $child)
    {
        $r = Child::with(['gender'])->find($child['id']);
        return $r;
    }

    public function store(Request $request)
    {
        $child = Child::create($request->all());

        return response()->json($child, 201);
    }

    public function update(Request $request, Child $child)
    {
        $child->update($request->all());

        return response()->json($child, 200);
    }

    public function delete(Child $child)
    {
        $child->delete();

        return response()->json(null, 204);
    }
}
