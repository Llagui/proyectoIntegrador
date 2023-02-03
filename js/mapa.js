let map = L.map('mapa').setView([42.6, -5.57], 13);

L.tileLayer('https://tile.thunderforest.com/outdoors/{z}/{x}/{y}.png?apikey=817534cc1dfa4813b498960345425794', {
    maxZoom: 19,
    attribution: '&copy; <a href="https://www.thunderforest.com/terms/">ThunderForest</a>'
}).addTo(map);

let marker = L.marker([42.6, -5.57]).addTo(map);

// var circle = L.circle([51.508, -0.11], {
//     color: 'red',
//     fillColor: '#f03',
//     fillOpacity: 0.5,
//     radius: 500
// }).addTo(map);