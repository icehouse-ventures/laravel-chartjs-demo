<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Collection;

class LiveWireDemoController extends \App\Http\Controllers\Controller
{

    public function showChart()
    {
        $start = Carbon::parse('2020-01-01');
        $end = Carbon::now();
        $period = CarbonPeriod::create($start, "1 month", $end);

        $sampleData = [
            '2020-01-31' => rand(10, 20),
            '2020-02-29' => rand(10, 20),
            '2020-03-31' => rand(10, 20),
            '2023-03-31' => rand(10, 20),
            '2023-04-30' => rand(10, 20),
            '2023-05-31' => rand(10, 20),
            '2023-06-30' => rand(10, 20),

        ];

        $usersPerMonth = collect($period)->map(function ($date) use ($sampleData) {
            $endDate = $date->copy()->endOfMonth()->format("Y-m-d");

            return [
                "count" => $sampleData[$endDate] ?? 0,
                "month" => $endDate
            ];
        });

        $data = $usersPerMonth->pluck("count")->toArray();
        $labels = $usersPerMonth->pluck("month")->toArray();

        $chart = app()
            ->chartjs->name("UserRegistrationsChart")
            ->type("line")
            ->size(["width" => 400, "height" => 200])
            ->labels($labels)
            ->datasets([
                [
                    "label" => "User Registrations",
                    "backgroundColor" => "rgba(38, 185, 154, 0.31)",
                    "borderColor" => "rgba(38, 185, 154, 0.7)",
                    "data" => $data
                ]
            ])
            ->options([
                'scales' => [
                    'x' => [
                        'type' => 'time',
                        'time' => [
                            'unit' => 'month'
                        ],
                        'min' => $start->format("Y-m-d"),
                    ]
                ],
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Monthly User Registrations'
                    ]
                ]
            ]);

        return view("livewire_demo_chart", compact("chart"));
    }
}
