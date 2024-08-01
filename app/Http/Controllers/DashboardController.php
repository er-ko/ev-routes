<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Models\Driver;
use App\Models\Garage;
use App\Models\Route;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $settings   = Settings::with('user')->where('user_id', auth()->id())->first();
        $myData     = Route::with('user')->where('user_id', auth()->id())->where('public', true)->get();
        $myDataWithTrailer = Route::with('user')->where('user_id', auth()->id())->where('public', true)->where('trailer', true)->get();
        $myDataWithoutTrailer = Route::with('user')->where('user_id', auth()->id())->where('public', true)->where('trailer', false)->get();
        $allData    = Route::with('user')->where('public', true)->get();
        $allDataWithTrailer = Route::with('user')->where('public', true)->where('trailer', true)->get();
        $allDataWithoutTrailer = Route::with('user')->where('public', true)->where('trailer', false)->get();

        $myDistance         = [];
        $myAvgTemp          = [];
        $myAvgSpeed         = [];
        $myAvgConsumption   = [];
        $allDistance        = [];
        $allAvgTemp         = [];
        $allAvgSpeed        = [];
        $allAvgConsumption  = [];

        $myDistanceWithTrailer         = [];
        $myAvgTempWithTrailer          = [];
        $myAvgSpeedWithTrailer         = [];
        $myAvgConsumptionWithTrailer   = [];
        $allDistanceWithTrailer        = [];
        $allAvgTempWithTrailer         = [];
        $allAvgSpeedWithTrailer        = [];
        $allAvgConsumptionWithTrailer  = [];

        $myDistanceWithoutTrailer         = [];
        $myAvgTempWithoutTrailer          = [];
        $myAvgSpeedWithoutTrailer         = [];
        $myAvgConsumptionWithoutTrailer   = [];
        $allDistanceWithoutTrailer        = [];
        $allAvgTempWithoutTrailer         = [];
        $allAvgSpeedWithoutTrailer        = [];
        $allAvgConsumptionWithoutTrailer  = [];

        foreach ($myData as $data) {
            if ($settings['temperature'] === $data['unit_temperature']) {
                $myAvgTemp[] = $data['avg_temp'];
            } else {
                $myAvgTemp[] = $settings['temperature'] == 'C' ? ($data['avg_temp'] - 32) * 5 / 9 : ($data['avg_temp'] * 9 / 5) + 32;
            }
            if ($settings['distance'] === $data['unit_distance']) {
                $myDistance[]  = $data['distance'];
                $myAvgSpeed[]  = $data['avg_speed'];
            } else {
                if ($settings['distance'] === 'mi') {
                    $myDistance[]  = $data['distance'] / 1.609344;
                    $myAvgSpeed[]  = $data['avg_speed'] * 0.621371192;
                } else {
                    $myDistance[]  = $data['distance'] * 1.609344;
                    $myAvgSpeed[]  = $data['avg_speed'] / 0.621371192;
                }
            }
            if ($settings['consumption'] === $data['unit_consumption']) {
                $myAvgConsumption[] = $data['avg_consumption'];
            } else {
                $myAvgConsumption[] = $settings['consumption'] == 'Wh' ? $data['avg_consumption'] / 0.0621371192 /10 : $data['avg_consumption'] * 0.0621371192;
            }
        }

        foreach ($allData as $data) {
            if ($settings['temperature'] === $data['unit_temperature']) {
                $allAvgTemp[] = $data['avg_temp'];
            } else {
                $allAvgTemp[] = $settings['temperature'] == 'C' ? ($data['avg_temp'] - 32) * 5 / 9 : ($data['avg_temp'] * 9 / 5) + 32;
            }
            if ($settings['distance'] === $data['unit_distance']) {
                $allDistance[]  = $data['distance'];
                $allAvgSpeed[]  = $data['avg_speed'];
            } else {
                if ($settings['distance'] === 'mi') {
                    $allDistance[]  = $data['distance'] / 1.609344;
                    $allAvgSpeed[]  = $data['avg_speed'] * 0.621371192;
                } else {
                    $allDistance[]  = $data['distance'] * 1.609344;
                    $allAvgSpeed[]  = $data['avg_speed'] / 0.621371192;
                }
            }
            if ($settings['consumption'] === $data['unit_consumption']) {
                $allAvgConsumption[] = $data['avg_consumption'];
            } else {
                $allAvgConsumption[] = $settings['consumption'] == 'Wh' ? $data['avg_consumption'] / 0.0621371192 : $data['avg_consumption'] * 0.0621371192;
            }
        }

        foreach ($myDataWithTrailer as $data) {
            if ($settings['temperature'] === $data['unit_temperature']) {
                $myAvgTempWithTrailer[] = $data['avg_temp'];
            } else {
                $myAvgTempWithTrailer[] = $settings['temperature'] == 'C' ? ($data['avg_temp'] - 32) * 5 / 9 : ($data['avg_temp'] * 9 / 5) + 32;
            }
            if ($settings['distance'] === $data['unit_distance']) {
                $myDistanceWithTrailer[]  = $data['distance'];
                $myAvgSpeedWithTrailer[]  = $data['avg_speed'];
            } else {
                if ($settings['distance'] === 'mi') {
                    $myDistanceWithTrailer[]  = $data['distance'] / 1.609344;
                    $myAvgSpeedWithTrailer[]  = $data['avg_speed'] * 0.621371192;
                } else {
                    $myDistanceWithTrailer[]  = $data['distance'] * 1.609344;
                    $myAvgSpeedWithTrailer[]  = $data['avg_speed'] / 0.621371192;
                }
            }
            if ($settings['consumption'] === $data['unit_consumption']) {
                $myAvgConsumptionWithTrailer[] = $data['avg_consumption'];
            } else {
                $myAvgConsumptionWithTrailer[] = $settings['consumption'] == 'Wh' ? $data['avg_consumption'] / 0.0621371192 /10 : $data['avg_consumption'] * 0.0621371192;
            }
        }

        foreach ($allDataWithTrailer as $data) {
            if ($settings['temperature'] === $data['unit_temperature']) {
                $allAvgTempWithTrailer[] = $data['avg_temp'];
            } else {
                $allAvgTempWithTrailer[] = $settings['temperature'] == 'C' ? ($data['avg_temp'] - 32) * 5 / 9 : ($data['avg_temp'] * 9 / 5) + 32;
            }
            if ($settings['distance'] === $data['unit_distance']) {
                $allDistanceWithTrailer[]  = $data['distance'];
                $allAvgSpeedWithTrailer[]  = $data['avg_speed'];
            } else {
                if ($settings['distance'] === 'mi') {
                    $allDistanceWithTrailer[]  = $data['distance'] / 1.609344;
                    $allAvgSpeedWithTrailer[]  = $data['avg_speed'] * 0.621371192;
                } else {
                    $allDistanceWithTrailer[]  = $data['distance'] * 1.609344;
                    $allAvgSpeedWithTrailer[]  = $data['avg_speed'] / 0.621371192;
                }
            }
            if ($settings['consumption'] === $data['unit_consumption']) {
                $allAvgConsumptionWithTrailer[] = $data['avg_consumption'];
            } else {
                $allAvgConsumptionWithTrailer[] = $settings['consumption'] == 'Wh' ? $data['avg_consumption'] / 0.0621371192 : $data['avg_consumption'] * 0.0621371192;
            }
        }

        foreach ($myDataWithoutTrailer as $data) {
            if ($settings['temperature'] === $data['unit_temperature']) {
                $myAvgTempWithoutTrailer[] = $data['avg_temp'];
            } else {
                $myAvgTempWithoutTrailer[] = $settings['temperature'] == 'C' ? ($data['avg_temp'] - 32) * 5 / 9 : ($data['avg_temp'] * 9 / 5) + 32;
            }
            if ($settings['distance'] === $data['unit_distance']) {
                $myDistanceWithoutTrailer[]  = $data['distance'];
                $myAvgSpeedWithoutTrailer[]  = $data['avg_speed'];
            } else {
                if ($settings['distance'] === 'mi') {
                    $myDistanceWithoutTrailer[]  = $data['distance'] / 1.609344;
                    $myAvgSpeedWithoutTrailer[]  = $data['avg_speed'] * 0.621371192;
                } else {
                    $myDistanceWithoutTrailer[]  = $data['distance'] * 1.609344;
                    $myAvgSpeedWithoutTrailer[]  = $data['avg_speed'] / 0.621371192;
                }
            }
            if ($settings['consumption'] === $data['unit_consumption']) {
                $myAvgConsumptionWithoutTrailer[] = $data['avg_consumption'];
            } else {
                $myAvgConsumptionWithoutTrailer[] = $settings['consumption'] == 'Wh' ? $data['avg_consumption'] / 0.0621371192 /10 : $data['avg_consumption'] * 0.0621371192;
            }
        }

        foreach ($allDataWithoutTrailer as $data) {
            if ($settings['temperature'] === $data['unit_temperature']) {
                $allAvgTempWithoutTrailer[] = $data['avg_temp'];
            } else {
                $allAvgTempWithoutTrailer[] = $settings['temperature'] == 'C' ? ($data['avg_temp'] - 32) * 5 / 9 : ($data['avg_temp'] * 9 / 5) + 32;
            }
            if ($settings['distance'] === $data['unit_distance']) {
                $allDistanceWithoutTrailer[]  = $data['distance'];
                $allAvgSpeedWithoutTrailer[]  = $data['avg_speed'];
            } else {
                if ($settings['distance'] === 'mi') {
                    $allDistanceWithoutTrailer[]  = $data['distance'] / 1.609344;
                    $allAvgSpeedWithoutTrailer[]  = $data['avg_speed'] * 0.621371192;
                } else {
                    $allDistanceWithoutTrailer[]  = $data['distance'] * 1.609344;
                    $allAvgSpeedWithoutTrailer[]  = $data['avg_speed'] / 0.621371192;
                }
            }
            if ($settings['consumption'] === $data['unit_consumption']) {
                $allAvgConsumptionWithoutTrailer[] = $data['avg_consumption'];
            } else {
                $allAvgConsumptionWithoutTrailer[] = $settings['consumption'] == 'Wh' ? $data['avg_consumption'] / 0.0621371192 : $data['avg_consumption'] * 0.0621371192;
            }
        }

        return view('dashboard.index', [
            'settings' => $settings,
            'my' => [
                'driver' => Driver::with('user')->where('user_id', auth()->id())->count(),
                'garage' => Garage::with('user')->where('user_id', auth()->id())->count(),
                'routes_no' => Route::with('user')->where('user_id', auth()->id())->where('public', true)->count(),
                'routes_distance' => collect($myDistance)->sum(),
                'routes_avg_temp' => collect($myAvgTemp)->avg(),
                'routes_avg_speed' => collect($myAvgSpeed)->avg(),
                'routes_avg_consumption' => collect($myAvgConsumption)->avg(),
                'routes_total_consumption' => Route::with('user')->where('user_id', auth()->id())->where('public', true)->sum('total_consumption'),
                'routes_supplied_energy' => Route::with('user')->where('user_id', auth()->id())->where('public', true)->sum('supplied_energy'),
            ],
            'all' => [
                'driver' => Driver::with('user')->count(),
                'garage' => Garage::with('user')->count(),
                'routes_no' => Route::with('user')->where('public', true)->count(),
                'routes_distance' => collect($allDistance)->sum(),
                'routes_avg_temp' => collect($allAvgTemp)->avg(),
                'routes_avg_speed' => collect($allAvgSpeed)->avg(),
                'routes_avg_consumption' => collect($allAvgConsumption)->avg(),
                'routes_total_consumption' => Route::with('user')->where('public', true)->sum('total_consumption'),
                'routes_supplied_energy' => Route::with('user')->where('public', true)->sum('supplied_energy'),
            ],
            'my_with_trailer' => [
                'routes_no' => Route::with('user')->where('user_id', auth()->id())->where('public', true)->where('trailer', true)->count(),
                'routes_distance' => collect($myDistanceWithTrailer)->sum(),
                'routes_avg_temp' => collect($myAvgTempWithTrailer)->avg(),
                'routes_avg_speed' => collect($myAvgSpeedWithTrailer)->avg(),
                'routes_avg_consumption' => collect($myAvgConsumptionWithTrailer)->avg(),
                'routes_total_consumption' => Route::with('user')->where('user_id', auth()->id())->where('public', true)->where('trailer', true)->sum('total_consumption'),
                'routes_supplied_energy' => Route::with('user')->where('user_id', auth()->id())->where('public', true)->where('trailer', true)->sum('supplied_energy'),
            ],
            'all_with_trailer' => [
                'routes_no' => Route::with('user')->where('public', true)->where('trailer', true)->count(),
                'routes_distance' => collect($allDistanceWithTrailer)->sum(),
                'routes_avg_temp' => collect($allAvgTempWithTrailer)->avg(),
                'routes_avg_speed' => collect($allAvgSpeedWithTrailer)->avg(),
                'routes_avg_consumption' => collect($allAvgConsumptionWithTrailer)->avg(),
                'routes_total_consumption' => Route::with('user')->where('public', true)->where('trailer', true)->sum('total_consumption'),
                'routes_supplied_energy' => Route::with('user')->where('public', true)->where('trailer', true)->sum('supplied_energy'),
            ],
            'my_without_trailer' => [
                'routes_no' => Route::with('user')->where('user_id', auth()->id())->where('public', true)->where('trailer', false)->count(),
                'routes_distance' => collect($myDistanceWithoutTrailer)->sum(),
                'routes_avg_temp' => collect($myAvgTempWithoutTrailer)->avg(),
                'routes_avg_speed' => collect($myAvgSpeedWithoutTrailer)->avg(),
                'routes_avg_consumption' => collect($myAvgConsumptionWithoutTrailer)->avg(),
                'routes_total_consumption' => Route::with('user')->where('user_id', auth()->id())->where('public', true)->where('trailer', false)->sum('total_consumption'),
                'routes_supplied_energy' => Route::with('user')->where('user_id', auth()->id())->where('public', true)->where('trailer', false)->sum('supplied_energy'),
            ],
            'all_without_trailer' => [
                'routes_no' => Route::with('user')->where('public', true)->where('trailer', false)->count(),
                'routes_distance' => collect($allDistanceWithoutTrailer)->sum(),
                'routes_avg_temp' => collect($allAvgTempWithoutTrailer)->avg(),
                'routes_avg_speed' => collect($allAvgSpeedWithoutTrailer)->avg(),
                'routes_avg_consumption' => collect($allAvgConsumptionWithoutTrailer)->avg(),
                'routes_total_consumption' => Route::with('user')->where('public', true)->where('trailer', false)->sum('total_consumption'),
                'routes_supplied_energy' => Route::with('user')->where('public', true)->where('trailer', false)->sum('supplied_energy'),
            ],
        ]);
    }
}
