<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FactorialController extends Controller
{
    //
    public function index(Request $request)
    {
        $num = $request->number;
        $factorial = 1;
        for ($x = $num; $x >= 1; $x--) {
            $factorial = $factorial * $x;
        }
        return response()->json([
            'result' => $factorial,
        ]);
    }
}
