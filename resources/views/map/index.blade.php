<x-app-layout>

<div class="container">
    <h1>Leaflet Map</h1>
    <div id="map" style="height: 500px;"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize the map and set its view to your chosen geographical coordinates and a zoom level
        var map = L.map('map').setView([49.254330, 22.690372], 14);

        // Add a tile layer to add to our map, in this case it's a OSM tile layer.
        // Creating a tile layer usually involves setting the URL template for the tiles.
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Add a marker at the center of the map
        var marker = L.marker([49.254330, 22.690372]).addTo(map);
        marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();
    });
</script>

</x-app-layout>