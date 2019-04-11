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

    public function show(Child $child)
    {
        return $child;
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
