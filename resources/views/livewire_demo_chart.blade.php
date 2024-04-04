
<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Registrations Chart</title>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8fafc;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            color: #636b6f;
            margin-bottom: 20px;
            text-align: center;
        }

        .chart-container {
            width: 90%;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
    </style>
@livewireStyles
@livewireScripts
</head>
<body>
    <div class="container">
        <h1>Monthly User Registrations</h1>
        <div class="chart-container">

            @livewire('chart')

        </div>
    </div>

</body>
</html>
