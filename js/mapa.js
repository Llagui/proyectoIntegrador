// Creacion de un mapa
// esta aparte y no con buscar pues el otro script se llama mas veces a lo largo de la página y este no
// No zoom con scroll let map = L.map('mapa',{scrollWheelZoom: false}).setView([42.6, -5.57], 8);
let map = L.map('mapa').setView([42.6, -5.57], 8);
L.tileLayer('https://tile.thunderforest.com/outdoors/{z}/{x}/{y}.png?apikey=817534cc1dfa4813b498960345425794', {
    maxZoom: 18,
    attribution: '&copy; <a href="https://www.thunderforest.com/terms/">ThunderForest</a>',
}).addTo(map);
