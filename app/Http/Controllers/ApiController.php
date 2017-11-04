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
      return json_encode($request('rfid_token'));
    }

    public function test2(Request $request)
    {
      return json_encode($request('rfid_token'));
    }
}
