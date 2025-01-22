<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SohbetController extends Controller
{
    public function reset(Request $request)
    {
        $request->session()->forget('Sorular');

        return redirect()->back();
    }
}
