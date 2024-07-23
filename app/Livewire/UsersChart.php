<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Carbon\CarbonPeriod;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Computed;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;

class UsersChart extends Component
{
    public $start;

    public $datasets;

    public function mount()
    {
        $this->start = Carbon::parse(User::min("created_at"))->toDateString();
    }

    #[Computed]
    public function carbonStart()
    {
        return Carbon::parse($this->start);
    }

    public function getData()
    {
        $end = Carbon::now();
        $period = CarbonPeriod::create($this->carbonStart, "1 month", $end);

        $usersPerMonth = collect($period)->map(function ($date) {
            $endDate = $date->copy()->endOfMonth();

            return [
                "count" => User::where("created_at", "<=", $endDate)->count(),
                "month" => $endDate->format("Y-m-d")
            ];
        });

        $data = $usersPerMonth->pluck("count")->toArray();
        $labels = $usersPerMonth->pluck("month")->toArray();

        $this->datasets = [
            'datasets' => [
                [
                    "label" => "User Registrations",
                    "backgroundColor" => "rgba(38, 185, 154, 0.31)",
                    "borderColor" => "rgba(38, 185, 154, 0.7)",
                    "data" => $data
                ]
            ],
            'labels' => $labels
        ];
    }

    #[Computed]
    public function chart()
    {
        return Chartjs::build()->name("UserRegistrationsChart")
            ->livewire()
            ->model("datasets")
            ->type("line")
            ->size(["width" => 400, "height" => 200])
            ->options([
                'scales' => [
                    'x' => [
                        'type' => 'time',
                        'time' => [
                            'unit' => 'month'
                        ],
                        'min' => $this->carbonStart->format("Y-m-d"),
                    ]
                ],
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Monthly User Registrations'
                    ]
                ]
            ]);
    }

    public function render()
    {
        $this->getData();

        return view('livewire.users-chart');
    }
}
