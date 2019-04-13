<?php

namespace App\Http\Controllers;

use App\Child;
use App\Contribution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContributionController extends Controller
{
    public function index()
    {
        $contributions = Contribution::with(['sponsor','child'])->get();
        return $contributions;
    }

    public function showChildMonthlyContribution(Request $request)
    {
        $child_id = $request->query('child_id');
        $year = $request->query('year');
        $data = DB::table('contributions')
            ->select(DB::raw("SUM(contribution) as contribution, to_char(to_timestamp (date_part('month', created_at)::text, 'MM'), 'TMmon') AS month"))
            ->whereRaw('child_id = ?',[$child_id])
            ->whereRaw('EXTRACT(year FROM "created_at") = ?',[$year])
            ->groupBy(DB::raw("month"))
            ->get();

        $output = array();
        foreach($data as $obj){
            array_push($output, array(
                'contribution' =>intval($obj->contribution),
                'month' => $obj->month
                )
            );

        }
        return $output;
    }

    public function store(Request $request)
    {
        $contribution = Contribution::create($request->all());

        return response()->json($contribution, 201);
    }

    public function update(Request $request, Contribution $contribution)
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
