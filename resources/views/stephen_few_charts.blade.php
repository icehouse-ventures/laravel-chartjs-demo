<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tufte Chart Progression</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6">Stephen Few: Chart Makeovers in Laravel Chart.js</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div class="bg-white p-4 shadow rounded-lg">
                <h2 class="text-lg font-semibold mb-4">Chart 1: Original</h2>
                {!! $chart1->render() !!}
            </div>

            <div class="bg-white p-4 shadow rounded-lg">
                <h2 class="text-lg font-semibold mb-4">Chart 2: Stephen Few Makeover Example</h2>
                {!! $chart2->render() !!}
            </div>

        </div>
    </div>
</body>
</html>
