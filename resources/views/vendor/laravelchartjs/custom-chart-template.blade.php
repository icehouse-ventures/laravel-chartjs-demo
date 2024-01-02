@once

<script>
    // Define the chartAreaBorder plugin with the ability to draw individual borders
    const chartAreaBorder = {
        id: 'chartAreaBorder',
        beforeDraw(chart, args, options) {
            const {ctx, chartArea: {left, top, right, bottom}} = chart;
            const defaultBorder = {
                borderColor: options.borderColor || null,
                borderWidth: options.borderWidth || 0,
                borderDash: options.borderDash || [],
                borderDashOffset: options.borderDashOffset || 0
            };

            // Draw border based on side-specific options or default
            function drawBorder(side) {
                const sideOptions = options[side] || {};
                const borderColor = sideOptions.borderColor || defaultBorder.borderColor;
                const borderWidth = sideOptions.borderWidth || defaultBorder.borderWidth;
                const borderDash = sideOptions.borderDash || defaultBorder.borderDash;
                const borderDashOffset = sideOptions.borderDashOffset || defaultBorder.borderDashOffset;

                if (borderWidth > 0 && borderColor) {
                    ctx.strokeStyle = borderColor;
                    ctx.lineWidth = borderWidth;
                    ctx.setLineDash(borderDash);
                    ctx.lineDashOffset = borderDashOffset;

                    ctx.beginPath();
                    switch (side) {
                        case 'top':
                            ctx.moveTo(left, top);
                            ctx.lineTo(right, top);
                            break;
                        case 'right':
                            ctx.moveTo(right, top);
                            ctx.lineTo(right, bottom);
                            break;
                        case 'bottom':
                            ctx.moveTo(right, bottom);
                            ctx.lineTo(left, bottom);
                            break;
                        case 'left':
                            ctx.moveTo(left, bottom);
                            ctx.lineTo(left, top);
                            break;
                    }
                    ctx.stroke();
                }
            }

            ctx.save();
            // Draw borders for all sides if specified
            ['top', 'right', 'bottom', 'left'].forEach(drawBorder);
            ctx.restore();
        }
    };
</script>

    @if($delivery == 'CDN')
            @if($version == 4)
                <script src="https://cdn.jsdelivr.net/npm/chart.js@^4"></script>
                @if($date_adapter == 'moment')
                    <script src="https://cdn.jsdelivr.net/npm/moment@^2"></script>
                    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-moment@^1"></script>
                @elseif($date_adapter == 'luxon')
                    <script src="https://cdn.jsdelivr.net/npm/luxon@^2"></script>
                    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@^1"></script>
                @elseif($date_adapter == 'date-fns')
                    <script src="https://cdn.jsdelivr.net/npm/date-fns@^3/index.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
                @endif
                <script src="https://cdn.jsdelivr.net/npm/numeral@2.0.6/numeral.min.js"></script>
            @elseif($version == 3)
                <script src="https://cdn.jsdelivr.net/npm/chart.js@^3"></script>
                @if($date_adapter == 'moment')
                    <script src="https://cdn.jsdelivr.net/npm/moment@^2"></script>
                    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-moment@^1"></script>
                @elseif($date_adapter == 'luxon')
                    <script src="https://cdn.jsdelivr.net/npm/luxon@^2"></script>
                    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@^1"></script>
                @elseif($date_adapter == 'date-fns')
                    <script src="https://cdn.jsdelivr.net/npm/date-fns@^3/index.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
                @endif
                <script src="https://cdn.jsdelivr.net/npm/numeral@2.0.6/numeral.min.js"></script>
            @else
                <script src="https://cdn.jsdelivr.net/npm/chart.js@^2"></script>
                @if($date_adapter == 'moment')
                    <script src="https://cdn.jsdelivr.net/npm/moment@^2"></script>
                    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-moment@^0.1.2"></script>
                @elseif($date_adapter == 'luxon')
                    <script src="https://cdn.jsdelivr.net/npm/luxon@^2"></script>
                    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@^1"></script>
                @elseif($date_adapter == 'date-fns')
                    <script src="https://cdn.jsdelivr.net/npm/date-fns@^3/index.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
                @endif
                <script src="https://cdn.jsdelivr.net/npm/numeral@2.0.6/numeral.min.js"></script>
            @endif
    @elseif($delivery == 'publish')

        @if($version == 4)
            <script type="module" src="{{ asset('vendor/laravelchartjs/chart.js') }}"></script>
        @elseif($version == 3)
            <script src="{{ asset('vendor/laravelchartjs/chart3.js') }}"></script>
        @else
            <script src="{{ asset('vendor/laravelchartjs/chart2.bundle.js') }}"></script>
        @endif
    @elseif($delivery == 'binary')
        @if($version == 4)
            <script>{!! $chartJsScriptv4 !!}</script>
        @elseif($version == 3)
            <script>{!! $chartJsScriptv3 !!}</script>
        @else
            <script>{!! $chartJsScriptv2 !!}</script>
        @endif
    @endif
@endonce

<canvas id="{!! $element !!}" width="{!! $size['width'] !!}" height="{!! $size['height'] !!}">
<script>

    document.addEventListener("DOMContentLoaded", function(event) {
        (function() {
    		"use strict";
            var ctx = document.getElementById("{!! $element !!}");
            window.{!! $element !!} = new Chart(ctx, {
                type: '{!! $type !!}',
                data: {
                    labels: {!! $labels !!},
                    datasets: {!! $datasets !!}
                },
                @if($options)
                options: {!! $options !!},
                @endif
                plugins: [chartAreaBorder]
            });
        })();
    });
</script>
</canvas>
