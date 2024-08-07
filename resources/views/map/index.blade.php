<x-app-layout>
    <div class="container mx-auto flex flex-col items-center justify-center max-h-screen">
        <h1 class="text-2xl mb-4">Map </h1>
        <div class="w-full max-w-4xl h-96">
            <div id="map" class="w-full h-96"></div>
        </div>
    </div>
    <script>
       
       const map = L.map('map').setView([49.24939, 22.69693], 18);
       const API_KEY = `{{env('MAP_CZ_API_KEY')}}`;

const tileLayers = {
	'Basic': L.tileLayer(`https://api.mapy.cz/v1/maptiles/basic/256/{z}/{x}/{y}?apikey=${API_KEY}`, {
    minZoom: 0,
    maxZoom: 19,
    attribution: '<a href="https://api.mapy.cz/copyright" target="_blank">&copy; Seznam.cz a.s. a další</a>',
}),
	'Outdoor': L.tileLayer(`https://api.mapy.cz/v1/maptiles/outdoor/256/{z}/{x}/{y}?apikey=${API_KEY}`, {
    minZoom: 0,
    maxZoom: 19,
    attribution: '<a href="https://api.mapy.cz/copyright" target="_blank">&copy; Seznam.cz a.s. a další</a>',
}),
	'Winter': L.tileLayer(`https://api.mapy.cz/v1/maptiles/winter/256/{z}/{x}/{y}?apikey=${API_KEY}`, {
    minZoom: 0,
    maxZoom: 19,
    attribution: '<a href="https://api.mapy.cz/copyright" target="_blank">&copy; Seznam.cz a.s. a další</a>',
}),
	'Aerial': L.tileLayer(`https://api.mapy.cz/v1/maptiles/aerial/256/{z}/{x}/{y}?apikey=${API_KEY}`, {
    minZoom: 0,
    maxZoom: 19,
    attribution: '<a href="https://api.mapy.cz/copyright" target="_blank">&copy; Seznam.cz a.s. a další</a>',
}),
};

/*
Then we add the first raster tile layer to the map.
See https://leafletjs.com/reference.html#tilelayer
*/
tileLayers['Outdoor'].addTo(map);

// Leaflet has a built-in map control for switching layers.
L.control.layers(tileLayers).addTo(map);

/*
We also require you to include our logo somewhere over the map.
We create our own map control implementing a documented interface,
that shows a clickable logo.
See https://leafletjs.com/reference.html#control
*/
const LogoControl = L.Control.extend({
  options: {
    position: 'bottomleft',
  },

  onAdd: function (map) {
    const container = L.DomUtil.create('div');
    const link = L.DomUtil.create('a', '', container);

    link.setAttribute('href', 'http://mapy.cz/');
    link.setAttribute('target', '_blank');
    link.innerHTML = '<img src="https://api.mapy.cz/img/api/logo.svg" />';
    L.DomEvent.disableClickPropagation(link);

    return container;
  },
});

// finally we add our LogoControl to the map
new LogoControl().addTo(map);

map.locate({setView: true, maxZoom: 16});

function onLocationFound(e) {
    var radius = e.accuracy;

    L.marker(e.latlng).addTo(map)
        .bindPopup("You are within " + radius + " meters from this point").openPopup();

    L.circle(e.latlng, radius).addTo(map);
}

map.on('locationfound', onLocationFound);

function onLocationError(e) {
    alert(e.message);
}

map.on('locationerror', onLocationError);

    </script>

</x-app-layout>