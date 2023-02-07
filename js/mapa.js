let map = L.map('mapa').setView([42.6, -5.57], 8);

L.tileLayer('https://tile.thunderforest.com/outdoors/{z}/{x}/{y}.png?apikey=817534cc1dfa4813b498960345425794', {
    maxZoom: 18,
    attribution: '&copy; <a href="https://www.thunderforest.com/terms/">ThunderForest</a>'
}).addTo(map);

