<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ApiController\transformCoordinates;

class ForecastController extends Controller
{
    public function getUrlsForMonth($month = '11')
    {
        $response = Http::get('https://data.public.lu/api/1/datasets/qualite-air-reseau-telemetrique/',);
        $resources = $response->object()->resources;
        $urls = [];

        foreach ($resources as $resource) {
            $string =  substr(explode('-', strstr($resource->title, '.', true))[4], -2);
            if ($string == $month) {
                $urls[] = $resource->url;
            }
        }
        return $urls;
    }

    public function getMonthData()
    {
        /* dd(json_decode(Http::get($this->getUrlsForMonth()[1])->body())); */
        $arrays = [];
        foreach ($this->getUrlsForMonth() as $url) {
            $response = Http::get($url);
            $arrays[] = json_decode($response->body());
        }
        return $arrays;
    }

    public function calculatingDayAverage($day = '01')
    {
        $stationDayly = [
            'Esch TES11' => [
                'pm10' => 0,
                'no2' => 0,
                'o3' => 0,
                'x' => '49.5050417',
                'y' => '5.976887',
                'i' => 0,
            ],
            'Esch TEG12' => [
                'pm10' => 0,
                'no2' => 0,
                'o3' => 0,
                'x' => '49.494166',
                'y' => '5.9847832',
                'i' => 0,
            ],
            'Oberpallen TBK11' => [
                'pm10' => 0,
                'no2' => 0,
                'o3' => 0,
                'x' => '49.7318503',
                'y' => '5.8471282',
                'i' => 0,
            ],
            'Vianden TVI11' => [
                'pm10' => 0,
                'no2' => 0,
                'o3' => 0,
                'x' => '49.9439319',
                'y' => '6.1759306',
                'i' => 0,
            ],
            'Beidweiler TBW11' => [
                'pm10' => 0,
                'no2' => 0,
                'o3' => 0,
                'x' => '49.7222753',
                'y' => '6.3052517',
                'i' => 0,
            ],
            'Luxembourg TLB11' => [
                'pm10' => 0,
                'no2' => 0,
                'o3' => 0,
                'x' => '49.5977126',
                'y' => '6.1375938°',
                'i' => 0,
            ],
            'Luxembourg TLW11' => [
                'pm10' => 0,
                'no2' => 0,
                'o3' => 0,
                'x' => '49.6115433',
                'y' => '6.1184772',
                'i' => 0,
            ],
        ];

        foreach ($this->getMonthData() as $dataArray) {
            foreach ($dataArray as $dataDay) {
                if (explode('/', strstr($dataDay->generated, ' ', true))[2] == $day) {
                    foreach ($dataDay->station as $station) {
                        switch ($station->code) {
                            case 'TES11':
                                $stationDayly[0]['o3'] += $station->data[0]->value;
                                $stationDayly[0]['no2'] += $station->data[1]->value;
                                $stationDayly[0]['pm10'] += $station->data[2]->value;
                                $stationDayly[0]['i']++;
                                break;
                        }
                    }
                };
            }
        }
    }
}
