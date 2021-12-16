<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class AjaxController extends Controller
{
    public function index()
    {
        $array = ['pollutant' => Storage::disk('json')->get('pm10.json')];
        return view('map', ['array' => $array]);
    }
    public function dataRequest(Request $request)
    {
        //dd($request);
        if ($request->no2)
            $array = ['pollutant' => Storage::disk('json')->get('no2.json')];
        elseif ($request->pm10)
            $array = ['pollutant' => Storage::disk('json')->get('pm10.json')];
        elseif ($request->pm25)
            $array = ['pollutant' => Storage::disk('json')->get('pm25.json')];
        else
            $array = ['pollutant' => Storage::disk('json')->get('o3.json')];


        //return response()->json(['array' => $array]);



         return view('map', ['array' => $array]); 
    }
}
