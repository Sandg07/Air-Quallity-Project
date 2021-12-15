// Where you want to render the map.
var element = document.getElementById("osm-map");

// Height has to be set. You can do this in CSS too.
element.style = "height:600px; width:600px";


/* 
var basemaps = {
    Grayscale: L.tileLayer('http://{s}.tiles.wmflabs.org/bw-mapnik/{z}/{x}/{y}.png', {
      maxZoom: 18,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }),
    Streets: L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    })
  };

  var groups = {
    poluents: new L.LayerGroup(),
    favorites: new L.LayerGroup()
  };

 */

// Create Leaflet map on map element.
var map = L.map(element);

// Add OSM tile layer to the Leaflet map.
L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
    attribution:
    '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);

// Target's GPS coordinates.
var targetLuxCity = L.latLng("49.8096317", "6.064453"); //Luxembourg

// Set map's center to target with zoom 14.
map.setView(targetLuxCity, 9);

// ********** Get the coordinates on click ********** 
/* function onMapClick(e) {
    alert("You clicked the map at " + e.latlng);
}

map.on("click", onMapClick); */

// *************************************************** 


// ********** INSERT LINES ********** 


/* var myLines = [
    {
        type: "LineString",
        coordinates: [
            //this one use first x then y
            [5.95722194, 49.50027806],
            [5.906932, 49.760736],
        ],
    }, */
    // {
    //     type: "LineString",
    //     coordinates: [
    //         [-105, 40],
    //         [-110, 45],
    //     ],
    // },
//];
/* 
var myStyle = {
    color: "#ff7800",
    weight: 5,
    opacity: 0.65,
};

L.geoJSON(myLines, {
    style: myStyle,
}).addTo(map); */


// *************************************************** 

// ***************** SCALE COLORS ********************* 
// > 200 = #800000
// 151 - 200 = #bf0000 
// 101 - 150 = #FF0000
// 71 - 100 = #FF9800
// 51 - 70 = #FFCC00
// 41 - 50 = #FFFF66
// 31 - 40 = #d9e1f9
// 21 - 30 = #b3c3f3
// 11 - 20 = #7a96ea
// <= 10 = #4169E1


// *************************************************** 


 /*  L.marker([39.61, -105.02]).bindPopup('Littleton, CO.').addTo(groups.poluents);

var groupedOverlays = {
    "Poluents": {
      "PM10": groups.poluents,
      
    },
    "Favorites": {
      "Favorite": groups.favorites,
     
    }
  };
  
  L.control.groupedLayers(basemaps, groupedOverlays, options).addTo(map);

var options = {
    exclusiveGroups: ["Poluents"],
    groupCheckboxes:true};



var layerControl = L.control.groupedLayers(groupedOverlays, options);
map.addControl(layerControl);

   */

// ***************** FUNCTION TO ADD THE POINTS ********************* 


function addPoint(LatLgn, color) {
   var circle = L.circle(LatLgn, {
       color: "transparent",
       fillColor: color,
       fillOpacity: 0.9,
       radius: 500,
    }).addTo(map);
    console.log(LatLgn);
} 


// *************************************************** 


// ***************** INSERT PM10 POINTS ********************* 

console.log(pollutant);
var allpm10 = pollutant.pm10.forEach(function (data) {
    if (data.index == 1) {
        var color = "#4169E1";
    } else if (data.index == 2) {
            var color = "#7a96ea";
        } else if (data.index == 3) {
            var color = "#b3c3f3";
        } else if (data.index == 4) {
            var color = "#d9e1f9";
        } else if (data.index == 5) {
            var color = "#FFFF66";
        } else if (data.index == 6) {
            var color = "#FFCC00";
        } else if (data.index == 7) {
            var color = "#FF9800";
        } else if (data.index == 8) {
            var color = "#FF0000";
        } else if (data.index == 9) {
            var color = "#bf0000";
        } else if (data.index == 9) {
            var color = "#800000";
        }
        //this one use first y then x
        var LatLgn = L.latLng(data.y, data.x);
        addPoint(LatLgn, color);
});   



