<div class="container">
    <h1>Monthly User Registrations</h1>
    <div class="chart-container">
        {!! $this->chart->render() !!}
    </div>
    <div style="margin: 1rem auto; display: flex; gap: 1rem; width: 90%;">
        <label for="start">Start date:</label>
        <input wire:model.live="start" type="date" id="start">
    </div>
</div>
