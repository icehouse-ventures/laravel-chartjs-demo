<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TufteChartController extends Controller
{
    public function showCharts()
    {
        return view('tufte_charts', [
            'chart1' => $this->createChart1(),
            'chart2' => $this->createChart2(),
            'chart3' => $this->createChart3(),
            'chart4' => $this->createChart4(),
            'chart5' => $this->createChart5(),
            'chart6' => $this->createChart6(),
        ]);
    }

    private function createChart1()
    {
        // Sample data for demonstration purposes
        $labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $data = [65, 59, 80, 81, 56, 55, 40, 65, 75, 64, 56, 70];

        // Create the baseline chart configuration
        $chart = app()->chartjs
            ->name('Chart1')
            ->type('bar')
            ->size(['width' => 400, 'height' => 200])
            ->labels($labels)
            ->datasets([
                [
                    'label' => 'User Registrations',
                    'backgroundColor' => 'rgba(200, 200, 200, 1)',
                    'borderColor' => 'rgba(128, 128, 128, 1)',
                    'borderWidth' => 2,
                    'data' => $data
                ]
            ])
            ->optionsRaw("{
                scales: {
                    x: {
                        grid: {
                            display: true,
                            color: 'rgba(0, 0, 0, 0.2)',
                            drawBorder: true,
                            drawOnChartArea: true,
                            drawTicks: true,
                            tickColor: 'rgba(0, 0, 0, 0.2)',
                            tickLength: 11,
                        },
                        ticks: {
                            display: true,
                            color: 'rgba(0, 0, 0, 0.8)',
                            font: {
                                size: 11
                            }
                        }
                    },
                    y: {
                        grid: {
                            display: true,
                            color: 'rgba(0, 0, 0, 0.2)',
                            drawBorder: true,
                            drawOnChartArea: true,
                            drawTicks: true,
                            tickColor: 'rgba(0, 0, 0, 0.2)',
                            tickLength: 11
                        },
                        ticks: {
                            display: true,
                            color: 'rgba(0, 0, 0, 0.8)',
                            font: {
                                size: 12
                            },
                            beginAtZero: true
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false,
                    },
                    title: {
                        display: true,
                        text: 'User Registrations',
                        font: {
                            size: 16
                        }
                    },
                    chartAreaBorder: {
                        borderColor: 'rgba(200, 200, 200, 1)',
                        borderWidth: 1,
                    }
                },
                elements: {
                    bar: {
                        borderWidth: 2
                    },
                    point: {
                        radius: 3,
                        hoverRadius: 5
                    },
                    line: {
                        tension: 0.4
                    }
                },
                responsive: true,
                maintainAspectRatio: true,
                layout: {
                    padding: {
                      right: 2 // Fix chart border and grids being cut off
                    }
                }
            }");

        return $chart;
    }

    private function createChart2()
    {
        // Sample data for demonstration purposes
        $labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $data = [65, 59, 80, 81, 56, 55, 40, 65, 75, 64, 56, 70];

        // Remove vertical gridlines but keep tick marks
        $chart = app()->chartjs
            ->name('Chart2')
            ->type('bar')
            ->size(['width' => 400, 'height' => 200])
            ->labels($labels)
            ->datasets([
                [
                    'label' => 'User Registrations',
                    'backgroundColor' => 'rgba(200, 200, 200, 1)',
                    'borderColor' => 'rgba(128, 128, 128, 1)',
                    'borderWidth' => 1,
                    'data' => $data
                ]
            ])
            ->optionsRaw("{
                scales: {
                    x: {
                        grid: {
                            display: true,
                            drawOnChartArea: false,
                            color: 'rgba(190, 190, 190, 1)',
                        },
                        ticks: {
                            display: true,
                            color: 'rgba(0, 0, 0, 0.8)',
                            font: {
                                size: 11
                            }
                        }
                    },
                    y: {
                        grid: {
                            display: true,
                            drawBorder: true,
                            borderColor: 'rgba(0, 0, 0, 0.1)',
                            borderWidth: 1
                        },
                        ticks: {
                            display: true,
                            color: 'rgba(0, 0, 0, 0.8)',
                            font: {
                                size: 12
                            },
                            beginAtZero: true
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false,
                        position: 'top',
                        labels: {
                            font: {
                                size: 14
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'User Registrations',
                        font: {
                            size: 16
                        }
                    },
                    chartAreaBorder: {
                        borderColor: 'rgba(220, 220, 220, 1)',
                        borderWidth: 1,
                    }

                },

                responsive: true,
                maintainAspectRatio: true,
                layout: {
                    padding: {
                      right: 2 // Fix chart border and grids being cut off
                    }
                }
            }");

        return $chart;
    }

    private function createChart3()
    {
        // Sample data for demonstration purposes
        $labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $data = [65, 59, 80, 81, 56, 55, 40, 65, 75, 64, 56, 70];

        // Create the more simplified chart configuration
        $chart = app()->chartjs
            ->name('Chart3')
            ->type('bar')
            ->size(['width' => 400, 'height' => 200])
            ->labels($labels)
            ->datasets([
                [
                    'label' => 'User Registrations',
                    'backgroundColor' => 'rgba(200, 200, 200, 1)',
                    'data' => $data
                ]
            ])
            ->optionsRaw("{
                scales: {
                    x: {
                        ticks: {
                            display: true,
                            color: 'rgba(0, 0, 0, 0.8)',
                            font: {
                                size: 10
                            },
                            beginAtZero: true
                        },
                        grid: {
                            display: false,
                        },
                    },
                    y: {
                        ticks: {
                            display: true,
                            color: 'rgba(0, 0, 0, 0.8)',
                            font: {
                                size: 12
                            },
                            beginAtZero: true
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'User Registrations',
                        font: {
                            size: 16
                        }
                    },
                    chartAreaBorder: {
                        borderColor: 'rgba(220, 220, 220, 1)',
                        borderWidth: 0.5
                    }
                },
                responsive: true,
                maintainAspectRatio: true,
                layout: {
                    padding: {
                      right: 2 // Fix chart border and grids being cut off
                    }
                }
            }");

        return $chart;
    }

    private function createChart4()
    {
        // Sample data for demonstration purposes
        $labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $data = [65, 59, 80, 81, 56, 55, 40, 65, 75, 64, 56, 70];

        // Create the minimalist chart configuration
        $chart = app()->chartjs
            ->name('Chart4')
            ->type('bar')
            ->size(['width' => 400, 'height' => 200])
            ->labels($labels)
            ->datasets([
                [
                    'backgroundColor' => 'rgba(200, 200, 200, 1)',
                    'data' => $data
                ]
            ])
            ->optionsRaw("{
                scales: {
                    x: {
                        ticks: {
                            display: false
                        }
                    },
                    y: {
                        ticks: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'User Registrations',
                        font: {
                            size: 16
                        }
                    },
                },
                elements: {
                    bar: {
                        borderWidth: 0
                    }
                },
                responsive: true,
                maintainAspectRatio: true,
                layout: {
                    padding: {
                      right: 2 // Fix chart border and grids being cut off
                    }
                }
            }");

        return $chart;
    }

    // ...

private function createChart5()
{
    // Sample data for demonstration purposes
    $labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    $data = [65, 59, 80, 81, 56, 55, 40, 65, 75, 64, 56, 70];

    // Create the chart configuration with negative gridlines
    $chart = app()->chartjs
        ->name('Chart5')
        ->type('bar')
        ->size(['width' => 400, 'height' => 200])
        ->labels($labels)
        ->datasets([
            [
                'label' => 'User Registrations',
                'backgroundColor' => 'rgba(200, 200, 200, 1)',
                'data' => $data
            ]
        ])
        ->optionsRaw("{
            scales: {
                x: {
                    border:{
                        display: true,
                        color: 'rgba(200, 200, 200, 0.8)',
                        width: 3,

                    },
                    grid: {
                        drawOnChartArea: false,
                        drawTicks: true,
                        color: 'rgba(200, 200, 200, 0.8)',
                    },
                    ticks: {
                        display: true
                    }
                },
                y: {
                    grid: {
                        drawOnChartArea: false,
                        drawTicks: true,
                        color: 'rgba(200, 200, 200, 1)',
                    },
                    border:{
                        display: true,
                        color: 'rgba(200, 200, 200, 0.8)',
                        width: 3,

                    },
                    ticks: {
                        display: true,
                        beginAtZero: true
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'User Registrations',
                    font: {
                        size: 16
                    }
                },
            },
            responsive: true,
            maintainAspectRatio: true,
            layout: {
                padding: {
                  right: 2 // Fix chart border and grids being cut off
                }
            }
        }");

    return $chart;
}

private function createChart6()
{
    // Sample data for demonstration purposes
    $labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    $data = [65, 59, 80, 81, 56, 55, 40, 65, 75, 64, 56, 70];

    // Create the chart configuration with horizontal gridlines and keyline border
    $chart = app()->chartjs
        ->name('Chart6')
        ->type('bar')
        ->size(['width' => 400, 'height' => 200])
        ->labels($labels)
        ->datasets([
            [
                'label' => 'User Registrations',
                'backgroundColor' => 'rgba(200, 200, 200, 1)',
                'data' => $data
            ]
        ])
        ->optionsRaw("{
            scales: {
                x: {
                    border:{
                        display: true,
                        color: 'rgba(200, 200, 200, 0.8)',
                        width: 3,

                    },

                    grid: {
                        display: false,
                        drawBorder: false,

                    },
                    ticks: {
                        display: false
                    }
                },
                y: {
                    display: false,
                    grid: {

                        drawBorder: false,
                    },
                    ticks: {
                        display: false,
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'User Registrations',
                    font: {
                        size: 16
                    }
                },
            },
            responsive: true,
            maintainAspectRatio: true,
            layout: {
                padding: {
                  right: 2 // Fix chart border and grids being cut off
                }
            }
        }");

    return $chart;
}

}
