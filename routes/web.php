<?php

use App\Livewire\UsersChart;
use App\Livewire\LivewireUsersDemo;
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

Route::get('/vanilla-blade', function() {
    // First let's build up our chart's data
    $chartjs = app()->chartjs
        ->name('chartComponentTest')
        ->type('bar')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['Label A', 'Label B', 'Label C'])
        ->datasets([
            [
                "label" => "My First Dataset",
                'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                'data' => [69, 59, 42],
            ],
            [
                "label" => "My Second Dataset",
                'backgroundColor' => 'rgba(255, 99, 132, 0.3)',
                'data' => [65, 32, 40],
            ],
        ])
        ->options([
            'plugins' =>[
                'title' => [
                    'display' => true,
                    'text' => 'Chart.js'
                ],
            ],
        ]);

    // Then render a standard Blade view, which will include a component that renders the chart
    return view('vanilla-blade', ['chart' => $chartjs,]);
});

Route::get('/vanilla-blade-multi', function() {
    // First let's build up our first chart's data
    $primaryChart = app()->chartjs
        ->name('chartComponentTest')
        ->type('bar')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['Label A', 'Label B', 'Label C'])
        ->datasets([
            [
                "label" => "My First Dataset",
                'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                'data' => [69, 59, 42],
            ],
            [
                "label" => "My Second Dataset",
                'backgroundColor' => 'rgba(255, 99, 132, 0.3)',
                'data' => [65, 32, 40],
            ],
        ])
        ->options([
            'plugins' =>[
                'title' => [
                    'display' => true,
                    'text' => 'Chart.js'
                ],
            ],
        ]);

    // Now a second chart
    $secondaryChart = app()->chartjs
             ->name('componentPieChartTest')
             ->type('pie')
             ->size(['width' => 400, 'height' => 200])
             ->labels(['Label x', 'Label y'])
             ->datasets([
                 [
                     'backgroundColor' => ['#FF6384', '#36A2EB'],
                     'hoverBackgroundColor' => ['#FF6384', '#36A2EB'],
                     'data' => [69, 59]
                 ],
            ]);

    // Then render a standard Blade view, which will include 2x components that renders these two charts
    return view('vanilla-blade-multi', [
        'primaryChart' => $primaryChart,
        'secondaryChart' => $secondaryChart,
    ]);
});

Route::get('/livewire-users-demo', LivewireUsersDemo::class);

Route::get('/example', 'App\Http\Controllers\ExampleController@show');

Route::get('/user/chart', UsersChart::class);

Route::get('/tufte/charts', 'App\Http\Controllers\TufteChartController@showCharts');

Route::get('/stephenfew/charts', 'App\Http\Controllers\StephenFewChartController@showCharts');
