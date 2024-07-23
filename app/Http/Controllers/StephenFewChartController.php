<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;

class StephenFewChartController extends Controller
{
    public function showCharts()
    {
        return view('stephen_few_charts', [
            'chart1' => $this->createChart1(),
            'chart2' => $this->createChart2(),

        ]);
    }

    private function createChart1()
    {
    // Static sample data
    $labels = ['1983', '1993', '2003', '2004', '2005'];
    $dataTime = [360, 320, 310, 290, 260];
    $dataNewsweek = [350, 250, 170, 180, 190];

    // Create the bar chart configuration
    $chart = Chartjs::build()
       ->name('NewsMagazineStaffSize')
       ->type('bar')
       ->size(['width' => 600, 'height' => 400])
       ->labels($labels)
       ->datasets([
           [
               'label' => 'Time',
               'backgroundColor' => '#59666D',
               'data' => $dataTime,
               'barPercentage' => 1.0,
               'categoryPercentage' => 0.8
           ],
           [
               'label' => 'Newsweek',
               'backgroundColor' => '#AB4331',
               'data' => $dataNewsweek,
               'barPercentage' => 1.0,
               'categoryPercentage' => 0.8
           ]
       ])
       ->optionsRaw("{
           scales: {
               x: {
                   grid: {
                       display: false
                   }
               },
               y: {
                   grid: {
                       display: true,
                       drawBorder: false,
                       color: 'rgba(0, 0, 0, 0.1)'
                   },
                   ticks: {
                        stepSize: 20
                     },
                    min: 160,
                    max: 380
               }
           },
           plugins: {
               legend: {
                   display: true,
                   position: 'bottom'
               },
               title: {
                   display: true,
                   text: 'News Magazines Staff Size Over Time',
                   font: {
                       size: 16
                   }
               }
           },
           responsive: true,
           maintainAspectRatio: true
       }");

    return $chart;
    }

    private function createChart2()
    {
    // Static sample data
    $labels = ['1983', '1993', '2003', '2004', '2005'];
    $dataTime = [360, 320, 310, 290, 260];
    $dataNewsweek = [350, 250, 170, 180, 200];

    // Create the line chart configuration
    $chart = Chartjs::build()
        ->name('TimeVsNewsweekStaffSize')
        ->type('line')
        ->size(['width' => 600, 'height' => 400])
        ->labels($labels)
        ->datasets([
            [
                'label' => 'Time Magazine',
                'backgroundColor' => '#A7BE82',
                'borderColor' => '#A7BE82',
                'data' => $dataTime,
                'fill' => false,
                'pointBackgroundColor' => '#A7BE82',
                'pointBorderColor' => '#A7BE82',
                'pointHoverBackgroundColor' => '#A7BE82',
                'pointHoverBorderColor' => '#A7BE82',
                'pointRadius' => '4'
            ],
            [
                'label' => 'Newsweek',
                'backgroundColor' => '#58A2D3',
                'borderColor' => '#58A2D3',
                'data' => $dataNewsweek,
                'fill' => false,
                'pointBackgroundColor' => '#58A2D3',
                'pointBorderColor' => '#58A2D3',
                'pointHoverBackgroundColor' => '#58A2D3',
                'pointHoverBorderColor' => '#58A2D3',
                'pointRadius' => '4'
            ]
        ])
        ->optionsRaw("{
            scales: {
                x: {
                    type: 'time',
                    time: {
                        unit: 'year'
                    },
                    grid: {
                        display: false,
                    },
                },
                y: {
                    grid: {
                        display: true,
                        drawBorder: false,
                        color: 'rgba(0, 0, 0, 0.1)'
                    },
                    min: 0,
                    max: 400
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                },
                title: {
                    display: true,
                    text: 'Time Magazine vs. Newsweek Magazine Staff Size Over Time',
                    font: {
                        size: 16
                    }
                }
            },
            responsive: true,
            maintainAspectRatio: true
        }");

    return $chart;
    }


}
