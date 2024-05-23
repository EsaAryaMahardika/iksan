// you want to get it of the window global
const providerOSM = new GeoSearch.OpenStreetMapProvider();

//leaflet map
var leafletMap = L.map('leafletMap-registration', {
fullscreenControl: true,
// OR
fullscreenControl: {
    pseudoFullscreen: false // if true, fullscreen to page width and height
},
minZoom: 2
}).setView([0,0], 2);

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(leafletMap);

let theMarker = {};

leafletMap.on('click',function(e) {
    let latitude  = e.latlng.lat.toString().substring(0,15);
    let longitude = e.latlng.lng.toString().substring(0,15);
    // document.getElementById("latitude").value = latitude;
    // document.getElementById("longitude").value = longitude;
    let popup = L.popup()
        .setLatLng([latitude,longitude])
        .setContent("Kordinat : " + latitude +" - "+  longitude )
        .openOn(leafletMap);

    if (theMarker != undefined) {
        leafletMap.removeLayer(theMarker);
    };
    theMarker = L.marker([latitude,longitude]).addTo(leafletMap);  
});

const search = new GeoSearch.GeoSearchControl({
    provider: providerOSM,
    style: 'bar',
    searchLabel: 'Sinjai',
});

leafletMap.addControl(search);