<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function login(Request $request)
    {

    }

    public function test(Request $request)
    {
      dd($request);
    }
}
