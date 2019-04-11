<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        return Currency::all();
    }

    public function show(Currency $currency)
    {
        return $currency;
    }

    public function store(Request $request)
    {
        $currency = Currency::create($request->all());

        return response()->json($currency, 201);
    }

    public function update(Request $request, Currency $currency)
    {
        $currency->update($request->all());

        return response()->json($currency, 200);
    }

    public function delete(Currency $currency)
    {
        $currency->delete();

        return response()->json(null, 204);
    }
}
