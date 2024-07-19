<div class="container">
    <h1>Monthly User Registrations</h1>
    <h6 style="text-align: center; font-size: 1em;">This is a Livewire component, initialising a ChartJS Blade component</h6>
    <div class="chart-container">
        <x-chartjs-component :chart="$this->chart" />
    </div>
    <div style="margin: 1rem auto; display: flex; gap: 1rem; width: 90%;">
        <label for="start">Start date:</label>
        <input wire:model.live="start" type="date" id="start">
    </div>
</div>
