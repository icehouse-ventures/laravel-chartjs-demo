<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Chart.js in vanilla Blade views</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100 p-8">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6">Rendering multiple Chart.js through a vanilla Blade view</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div class="bg-white p-4 shadow rounded-lg">
                <div class="mb-6 pb-6 border-b-2 border-dashed">
                    <h2 class="text-lg font-semibold mb-4">Primary chart</h2>
                    <x-chartjs-component :chart="$primaryChart" />
                </div>

                <div>
                    <h2 class="text-lg font-semibold mb-4">Secondary chart</h2>
                    <x-chartjs-component :chart="$secondaryChart" />
                </div>
            </div>
        </div>
    </div>
</body>
</html>
