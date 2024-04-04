<?php
namespace App\Livewire;

use Livewire\Component;

class Chart extends Component
{
    public $chartdata;
    public $newchartdata;

    public function mount()
    {

        $this->chartdata = [
            [
                "label" => "My First Dataset",
                'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                'data' => [
                    random_int(10, 100),
                    random_int(10, 100),
                    random_int(10, 100),
                    ]
            ],
            [
                "label" => "My Second Dataset",
                'backgroundColor' => 'rgba(255, 99, 132, 0.3)',
                'data' => [
                    random_int(10, 100),
                    random_int(10, 100),
                    random_int(10, 100),
                    ]
            ]
        ];

    }

    public function render()
    {
        return view('livewire.chart', [
            'chartdata' => $this->chartdata,
        ]);
    }
    public function updateChartData()
    {
        $this->chartdata = [
            [
                "label" => "My First Dataset",
                'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                'data' => [
                    0,
                    0,
                    0,
                    ]
            ],
            [
                "label" => "My Second Dataset",
                'backgroundColor' => 'rgba(255, 99, 132, 0.3)',
                'data' => [
                    random_int(10, 100),
                    random_int(10, 100),
                    random_int(10, 100),
                    ]
            ]
        ];

        $this->dispatch('chartDataUpdated');

    }
}
