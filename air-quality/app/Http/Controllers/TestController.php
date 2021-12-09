<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function index()
    {
        return view('testSB');
    }

    // read an API
    public function read_api()
    {
        $response = Http::get('https://api.openstreetmap.org/api/0.6/[nodes|ways|relations]?#parameters');

        dd($response->object());
    }
}
