<?php

namespace App\Http\Controllers;

use App\Helpers\MathHelper;
use Illuminate\Http\Request;

class MathController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'expression' => 'required|string'
        ]);

        $expression = $validated['expression'];

        try {
            $result = MathHelper::calculate($expression);
        } catch (\Exception $e) {
            return view('welcome')->withErrors(['expression' =>'Invalid expression.']);
        }

        return view('welcome', compact('result', 'expression'));
    }
}
