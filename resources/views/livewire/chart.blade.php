
<div>
    <div class="container">
        <h1>Monthly User Registrations</h1>
        <div class="chart-container">
            @php
                $chart = app()->chartjs
                    ->name('barChartTest')
                    ->type('bar')
                    ->size(['width' => 400, 'height' => 200])
                    ->labels(['Label A', 'Label B', 'Label C'])
                    ->datasets($chartdata)
                    ->options([
                        'plugins' => [
                            'title' => [
                                'display' => true,
                                'text' => 'Chart.js'
                            ]
                        ]
                    ]);
            @endphp
            <div wire:ignore>
                {!! $chart->render() !!}
            </div>

            <div>
                <h1>Count</h1>
                <button wire:click="updateChartData">Refresh Chart</button>
            </div>

            <script>
                document.addEventListener('livewire:load', function() {
                    window.livewire.on('chartDataUpdated', () => {
                        @this.$refresh();
                    });
                });
            </script>

        </div>
    </div>
</div>



@script
<script>
    Alpine.data('counter', () => {
        return {
            count: 0,
            increment() {
                this.count++
            },
        }
    })

    let components = Livewire.all()
    console.log(components);
</script>
@endscript

@script
<script>
    console.log('Script tag execution started.');

    document.addEventListener('DOMContentLoaded', () => {
        console.log('DOM fully loaded and parsed.');
    });

    // Check Livewire
    document.addEventListener('livewire:load', function(event) {
        console.log('Livewire 1.');
        console.log(event);

    });

    document.addEventListener('livewire:init', () => {
        console.log('Livewire 2.');
        // on the page...
    })

    document.addEventListener('livewire:initialized', () => {
        console.log('Livewire 3.');
        // on the page...
    })

    document.addEventListener('livewire:chartDataUpdated', () => {
        console.log('Livewire 4.');
        // on the page...
    })

    document.addEventListener('livewire:chartDataUpdated', () => {
        console.log('Livewire 5.');
        // on the page...
    });

</script>



<script>
if (typeof Alpine === 'undefined') {
    console.error('Alpine.js is not loaded.');
} else {
    console.log('Alpine.js is loaded.');


}
</script>

@endscript

<script>
    Alpine.listen('chartDataUpdated', (component) => {
        console.log('Alpine 1.');
        console.log(component);
    });
    </script>
