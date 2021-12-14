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
            'Esch1' => [
                'polLabel' => [
                    'PM10' => 0,
                    'NO2' => 0,
                    'Ozone' => 0,
                ],
                'x' => '49.5050417',
                'y' => '5.976887',
                'i' => 0,
                'j' => 0,
                'k' => 0,

            ],
            'Esch2' => [
                'polLabel' => [
                    'PM10' => 0,
                    'NO2' => 0,
                    'Ozone' => 0,
                ],
                'x' => '49.494166',
                'y' => '5.9847832',
                'i' => 0,
                'j' => 0,
                'k' => 0,
            ],
            'Oberpallen' => [
                'polLabel' => [
                    'PM10' => 0,
                    'NO2' => 0,
                    'Ozone' => 0,
                ],
                'x' => '49.7318503',
                'y' => '5.8471282',
                'i' => 0,
                'j' => 0,
                'k' => 0,
            ],
            'Vianden' => [
                'polLabel' => [
                    'PM10' => 0,
                    'NO2' => 0,
                    'Ozone' => 0,
                ],
                'x' => '49.9439319',
                'y' => '6.1759306',
                'i' => 0,
                'j' => 0,
                'k' => 0,
            ],
            'Beidweiler' => [
                'polLabel' => [
                    'PM10' => 0,
                    'NO2' => 0,
                    'Ozone' => 0,
                ],
                'x' => '49.7222753',
                'y' => '6.3052517',
                'i' => 0,
                'j' => 0,
                'k' => 0,
            ],
            'Luxembourg1' => [
                'polLabel' => [
                    'PM10' => 0,
                    'NO2' => 0,
                    'Ozone' => 0,
                ],
                'x' => '49.5977126',
                'y' => '6.1375938',
                'i' => 0,
                'j' => 0,
                'k' => 0,
            ],
            'Luxembourg2' => [
                'polLabel' => [
                    'PM10' => 0,
                    'NO2' => 0,
                    'Ozone' => 0,
                ],
                'x' => '49.6115433',
                'y' => '6.1184772',
                'i' => 0,
                'j' => 0,
                'k' => 0,
            ],
        ];

        foreach ($this->getMonthData() as $dataArray) {
            foreach ($dataArray as $dataDay) {
                if (explode('/', strstr($dataDay->generated, ' ', true))[2] == $day) {
                    foreach ($dataDay->station as $station) {

                        switch ($station->code) {
                            case 'TES11':
                                foreach ($station->data as $polluant) {
                                    switch ($polluant->polLabel) {
                                        case 'PM10':
                                            $stationDayly['Esch1']['polLabel']['PM10'] += $polluant->value;
                                            $stationDayly['Esch1']['i']++;
                                            break;
                                        case 'Ozone':
                                            $stationDayly['Esch1']['polLabel']['Ozone'] += $polluant->value;
                                            $stationDayly['Esch1']['j']++;
                                            break;
                                        case 'NO2':
                                            $stationDayly['Esch1']['polLabel']['NO2'] += $polluant->value;
                                            $stationDayly['Esch1']['k']++;
                                            break;
                                    }
                                }
                                break;
                            case 'TEG12':
                                foreach ($station->data as $polluant) {
                                    switch ($polluant->polLabel) {
                                        case 'PM10':
                                            $stationDayly['Esch2']['polLabel']['PM10'] += $polluant->value;
                                            $stationDayly['Esch2']['i']++;
                                            break;
                                        case 'Ozone':
                                            $stationDayly['Esch2']['polLabel']['Ozone'] += $polluant->value;
                                            $stationDayly['Esch2']['j']++;
                                            break;
                                        case 'NO2':
                                            $stationDayly['Esch2']['polLabel']['NO2'] += $polluant->value;
                                            $stationDayly['Esch2']['k']++;
                                            break;
                                    }
                                }
                                break;
                            case 'TBK11':
                                foreach ($station->data as $polluant) {
                                    switch ($polluant->polLabel) {
                                        case 'PM10':
                                            $stationDayly['Oberpallen']['polLabel']['PM10'] += $polluant->value;
                                            $stationDayly['Oberpallen']['i']++;
                                            break;
                                        case 'Ozone':
                                            $stationDayly['Oberpallen']['polLabel']['Ozone'] += $polluant->value;
                                            $stationDayly['Oberpallen']['j']++;
                                            break;
                                        case 'NO2':
                                            $stationDayly['Oberpallen']['polLabel']['NO2'] += $polluant->value;
                                            $stationDayly['Oberpallen']['k']++;
                                            break;
                                    }
                                }
                                break;
                            case 'TVI11':
                                foreach ($station->data as $polluant) {
                                    switch ($polluant->polLabel) {
                                        case 'PM10':
                                            $stationDayly['Vianden']['polLabel']['PM10'] += $polluant->value;
                                            $stationDayly['Vianden']['i']++;
                                            break;
                                        case 'Ozone':
                                            $stationDayly['Vianden']['polLabel']['Ozone'] += $polluant->value;
                                            $stationDayly['Vianden']['j']++;
                                            break;
                                        case 'NO2':
                                            $stationDayly['Vianden']['polLabel']['NO2'] += $polluant->value;
                                            $stationDayly['Vianden']['k']++;
                                            break;
                                    }
                                }
                                break;
                            case 'TBW11':
                                foreach ($station->data as $polluant) {
                                    switch ($polluant->polLabel) {
                                        case 'PM10':
                                            $stationDayly['Beidweiler']['polLabel']['PM10'] += $polluant->value;
                                            $stationDayly['Beidweiler']['i']++;
                                            break;
                                        case 'Ozone':
                                            $stationDayly['Beidweiler']['polLabel']['Ozone'] += $polluant->value;
                                            $stationDayly['Beidweiler']['j']++;
                                            break;
                                        case 'NO2':
                                            $stationDayly['Beidweiler']['polLabel']['NO2'] += $polluant->value;
                                            $stationDayly['Beidweiler']['k']++;
                                            break;
                                    }
                                }
                                break;
                            case 'TLB11':
                                foreach ($station->data as $polluant) {
                                    switch ($polluant->polLabel) {
                                        case 'PM10':
                                            $stationDayly['Luxembourg1']['polLabel']['PM10'] += $polluant->value;
                                            $stationDayly['Luxembourg1']['i']++;
                                            break;
                                        case 'Ozone':
                                            $stationDayly['Luxembourg1']['polLabel']['Ozone'] += $polluant->value;
                                            $stationDayly['Luxembourg1']['j']++;
                                            break;
                                        case 'NO2':
                                            $stationDayly['Luxembourg1']['polLabel']['NO2'] += $polluant->value;
                                            $stationDayly['Luxembourg1']['k']++;
                                            break;
                                    }
                                }
                                break;
                            case 'TLW11':
                                foreach ($station->data as $polluant) {
                                    switch ($polluant->polLabel) {
                                        case 'PM10':
                                            $stationDayly['Luxembourg2']['polLabel']['PM10'] += $polluant->value;
                                            $stationDayly['Luxembourg2']['i']++;
                                            break;
                                        case 'Ozone':
                                            $stationDayly['Luxembourg2']['polLabel']['Ozone'] += $polluant->value;
                                            $stationDayly['Luxembourg2']['j']++;
                                            break;
                                        case 'NO2':
                                            $stationDayly['Luxembourg2']['polLabel']['NO2'] += $polluant->value;
                                            $stationDayly['Luxembourg2']['k']++;
                                            break;
                                    }
                                }
                                break;
                        }
                    }
                };
            }
        }

        foreach ($stationDayly as $station => $value) {
            /*  dd($value['polLabel']['Ozone']); */
            $stationDayly[$station]['polLabel']['PM10'] = $value['polLabel']['PM10']  / $value['i'];
            $stationDayly[$station]['polLabel']['Ozone'] = $value['polLabel']['Ozone'] / $value['j'];
            $stationDayly[$station]['polLabel']['NO2'] = $value['polLabel']['NO2'] / $value['k'];
        }
        return $stationDayly;
    }
}
