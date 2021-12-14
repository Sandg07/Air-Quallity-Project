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
        foreach ($this->getMonthData() as $dataArray) {
            foreach ($dataArray as $dataDay) {
                echo $dataDay->generated;
            }
        }
    }
}
