<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

$chartjs = app()->chartjs
         ->name('barChartTest')
         ->type('bar')
         ->size(['width' => 400, 'height' => 200])
         ->labels(['Label A', 'Label B', 'Label C'])
         ->datasets([
             [
                 "label" => "My First Dataset",
                 'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                 'data' => [69, 59, 42]
             ],
             [
                 "label" => "My Second Dataset",
                 'backgroundColor' => 'rgba(255, 99, 132, 0.3)',
                 'data' => [65, 32, 40]
             ]
         ])
         ->options([
                'plugins' =>[
                    'title' => [
                        'display' => true,
                        'text' => 'Chart.js'
                        ]
                ]

         ]);

    return view('welcome', compact('chartjs'));
    });

    Route::get('/legacy', function () {

        $chartjs = app()->chartjs
                 ->name('barChartTest')
                 ->type('bar')
                 ->size(['width' => 400, 'height' => 200])
                 ->labels(['Label A', 'Label B', 'Label C'])
                 ->datasets([
                     [
                         "label" => "My First Dataset",
                         'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                         'data' => [69, 59, 42]
                     ],
                     [
                         "label" => "My Second Dataset",
                         'backgroundColor' => 'rgba(255, 99, 132, 0.3)',
                         'data' => [65, 32, 40]
                     ]
                 ])
                 ->options([
                        'plugins' =>[
                            'title' => [
                                'display' => true,
                                'text' => 'Chart.js'
                                ]
                        ]

                 ]);

        return view('welcome_5', compact('chartjs'));
        });

    Route::get('/example', 'App\Http\Controllers\ExampleController@show');

    Route::get('/user/chart', 'App\Http\Controllers\UserController@showChart');

    Route::get('/tufte/charts', 'App\Http\Controllers\TufteChartController@showCharts');

    Route::get('/stephenfew/charts', 'App\Http\Controllers\StephenFewChartController@showCharts');

    Route::get('/livewire/chart', 'App\Http\Controllers\LiveWireDemoController@showChart');
