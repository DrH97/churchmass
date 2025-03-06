<x-layouts.app title="Dashboard">
    <livewire:churches-table />

    <x-maps-leaflet :centerPoint="['lat' => -1.28, 'long' => 36.82]" :zoomLevel="13" :smarkers="[[]]"></x-maps-leaflet>

</x-layouts.app>
