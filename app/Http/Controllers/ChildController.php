<?php

namespace App\Http\Controllers;

use App\Child;
use Illuminate\Http\Request;

class ChildController extends Controller
{
    public function index()
    {
        $children = Child::with(['sponsor.sponsor','gender'])->get();
//        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
//        $out->writeln($children);
        return $children;
    }

    public function search(Request $request)
    {
        $search = $request->query('q');
        # TODO Update to Full text search using something like elastic search
        $query= Child::query()
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
