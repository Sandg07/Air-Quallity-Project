<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    public function index()
    {
        $array = ['pollutant' => Storage::disk('json')->get('pm10.json')];
        return view('map', ['array' => $array]);
    }


    public function readApiLux()
    {
        if (!Storage::disk('json')->has('timestamp.txt') || (Storage::disk('json')->has('timestamp.txt') && (int)Storage::disk('json')->get('timestamp.txt') < time())) {
            //Call the API to get the URL for the data from luxembourg
            $response = Http::get('https://data.public.lu/api/1/datasets/qualite-air-modelisation-interpolation-geostatistique',);
            $time = $response->object()->resources[18]->last_modified;

            $this->controllTimestamp($time);
            $urls = [
                'no2' => $response->object()->resources[15]->url,
                'pm25' => $response->object()->resources[16]->url,
                'pm10' => $response->object()->resources[17]->url,
                'o3' => $response->object()->resources[18]->url
            ];

            foreach ($urls as $key => $url) {
                $data = $this->makeCall($url);
                Storage::disk('json')->put($key . '.json', json_encode([$key => $data], JSON_PRETTY_PRINT));
            }
        }
    }

    public function controllTimestamp($date)
    {
        $formattedDate = strtotime('+1 day', strtotime(implode(' ', explode('T', strstr($date, '.', true)))));
        Storage::disk('json')->put('timestamp.txt', $formattedDate);
    }

    public function makeCall($url)
    {
        $response = Http::get($url);

        //Retrieving only coordinates, value and index from the object
        $data = $response->object()->grid;

        //Transform the coordinates to a format we can use it
        $string = '';
        $transformed = [];
        $i = 0;
        $j = count($data);

        foreach ($data as $key => $grid) {
            //transform the XY points to a string to pass it to the URL for the transform API
            $coords = explode(':', $grid->gc_id);
            $x = trim($coords[0], 'X-');
            $y = trim($coords[1], 'Y-');
            $string .= $x . "," . $y . ';';

            $i++;

            //Cutting of the loop inbetween before the query for the API gets to big
            if ($i == 300 || $j == $i) {
                //retrieving the ; at the end to have the right string
                $string = substr($string, 0, -1);
                //transform the coordinates
                $temp = $this->transformCoordinates($string);
                //change json string to php object
                $jsontemp = json_decode($temp);
                //save everything into an array
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
        //saving also the value in the array
        foreach ($transformed as $key => $finalObject) {
            $finalObject->value = $data[$key]->value;
            $finalObject->index = $data[$key]->index;
        }

        return $transformed;
    }

    public function transformCoordinates($url)
    {
        $call = Http::get('http://epsg.io/trans?data=' . $url . '&s_srs=2169&&t_srs=4326');

        return $call->body();
    }
}
