<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function readApiLux()
    {
        $response = Http::get('https://data.public.lu/api/1/datasets/qualite-air-modelisation-interpolation-geostatistique/resources/3289d6ff-4b87-415d-80e8-af2bac1286b8',);


        $response2 = Http::get($response->object()->url);
        $data = $response2->object()->grid;
        /* dd($data); */
        return view('readApi', ['data' => $data]);
    }
}
