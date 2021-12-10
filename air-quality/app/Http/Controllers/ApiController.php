<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function readApiLux()
    {

        //Call the API to get the URL for the data from luxembourg
        $response = Http::get('https://data.public.lu/api/1/datasets/qualite-air-modelisation-interpolation-geostatistique/resources/3289d6ff-4b87-415d-80e8-af2bac1286b8',);

        //API Call to the specific URL we want to use
        $response2 = Http::get($response->object()->url);
        //Retrieving only coordinates, value and index from the object
        $data = $response2->object()->grid;
        /*  dd($data); */


        //Transform the coordinates to a format we can use it
        $string = '';
        $transformed = [];
        $i = 0;
        $j = count($data);
        echo $j;

        foreach ($data as $key => $grid) {
            $coords = explode(':', $grid->gc_id);
            $x = trim($coords[0], 'X-');
            $y = trim($coords[1], 'Y-');
            $string .= $x . "," . $y . ';';

            $i++;
            if ($i == 300 || ($j == 193 && $i == 193)) {
                $string = substr($string, 0, -1);

                $temp = $this->transformCoordinates($string);
                $jsontemp = json_decode($temp);

                if (empty($transformed)) {
                    $transformed = $jsontemp;
                } else {
                    foreach ($jsontemp as $currentdata) {
                        $transformed[] = $currentdata;
                    }
                }

                $string = '';
                $i = 0;
                $j -= 300;
            }
        }

        foreach ($transformed as $key => $finalObject) {
            $finalObject->value = $data[$key]->value;
            $finalObject->value = $data[$key]->index;
        }

        dd($transformed);

        /* return view('readApi', ['data' => $data]); */
    }

    public function transformCoordinates($url)
    {
        $call = Http::get('http://epsg.io/trans?data=' . $url . '&s_srs=2169&&t_srs=4326');

        return $call->body();
    }
}
