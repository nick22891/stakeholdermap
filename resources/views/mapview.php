<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 3/29/15
 * Time: 12:51 PM
 */

?>

<html>

<head>

    <title>Stakeholder Map Demo</title>

    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />

    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <link rel="stylesheet" href="css/L.Control.Sidebar.css" />

    <link rel="stylesheet" href="css/L.Control.Sidebar.scss" />

    <script src="js/L.Control.Sidebar.js"></script>

    <script>

        var iconShade = "http://www.argentmac.com/devca/icons/Aliz.jpg";

        var preContent = "";

        function getEverything () {

            var countries = [];

            $.ajax({

                type: "GET",

                url: "http://stakeholdermap.eu1.frbit.net/stakeholdersJSON",

                dataType : "json",

                success : function (data) {

                    for(i = 0;i<data.results.length;i++){

                        country = data.results[i].country;

                        name = data.results[i].name;

                        type = data.results[i].type;

                        url = data.results[i].url;

                        size = data.results[i].size;

                        functional_area = data.results[i].functional_area;

                        //alert(countries[i]);

                        plotCountry(country, name, type, url, functional_area, size);

                    }

                }

            });

            //alert(countries[4]);

        }

        function plotCountry (country, name, type, url, functional_area, size) {

            country = country.replace("&", "and");

            //alert(country);

            $.ajax({

                type : "GET",

                url: encodeURI("http://stakeholdermap.eu1.frbit.net/geocodesJSON/" + country),

                dataType : "json",

                success : function (data) {

                    //for(i = 0;i<5;i++){

                    //alert("Country : " + country + ", Latitude :" + data.results[0].latitude + ", Longitude :" + data.results[0].longitude);

                    //}

                    //var marker = L.marker([data.results[0].latitude, data.results[0].longitude]).addTo(map);

                    iconShade = "http://www.argentmac.com/devca/icons/Aliz.png";

                    if (type == "Bank/Investment/Consulting") iconShade = "http://www.argentmac.com/devca/icons/Emerald.png";

                    if (type == "Government") iconShade = "http://www.argentmac.com/devca/icons/cloud.png";

                    if (type == "Education/Research") iconShade = "http://www.argentmac.com/devca/icons/wetasphalt.png";

                    if (type == "NGO") iconShade = "http://www.argentmac.com/devca/icons/sunflower.png";

                    if (type == "ICT Services") iconShade = "http://www.argentmac.com/devca/icons/Silver.png";

                    if (type == "MNO/Telecommunications") iconShade = "http://www.argentmac.com/devca/icons/Pongrante.png";

                    if (type == "Media/Marketing") iconShade = "http://www.argentmac.com/devca/icons/Ametheyst.png";



                    switch (country) {

                        case "Jamaica" : marker = L.marker(new L.LatLng(data.results[0].latitude, data.results[0].longitude), {
                            icon:	new L.NumberedDivIcon({number: size, iconUrl : iconShade})
                            //title: title
                        });

                            //marker.bindPopup("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                            marker.on('click', function () {

                                preContent = "<b>Stakeholder</b><br><br>Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area + "<br><br><b>Initiatives</b><br>";

                                $.ajax({

                                    type: "GET",

                                    url: encodeURI("http://stakeholdermap.eu1.frbit.net/initiativesJSON/" + name),

                                    dataType : "json",

                                    success : function (data) {

                                        for(i = 0;i<data.results.length;i++){

                                            eventname = data.results[i].name;

                                            preContent = "" + preContent + "<br>" + (i + 1) + ". " + eventname + "<br><br>Year : " + data.results[i].date + "<br><br>Url : " + data.results[i].initiative_url + "<br>";

                                        }

                                        sidebar.show();

                                        $("#sidebar").html(preContent);

                                    }

                                });


                            });

                            jamaica.addLayer(marker);

                            break;

                        case "Barbados" : marker = L.marker(new L.LatLng(data.results[0].latitude, data.results[0].longitude), {
                            icon:	new L.NumberedDivIcon({number: size, iconUrl : iconShade})           								//title: title
                        });

//marker.bindPopup("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                            marker.on('click', function () {

                                $("#sidebar").html("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                                sidebar.show();

                            });
                            barbados.addLayer(marker);

                            break;

                        case "Bahamas" : marker = L.marker(new L.LatLng(data.results[0].latitude, data.results[0].longitude), {
                            icon:	new L.NumberedDivIcon({number: size, iconUrl : iconShade})        										});

//marker.bindPopup("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                            marker.on('click', function () {

                                $("#sidebar").html("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                                sidebar.show();

                            });
                            bahamas.addLayer(marker);

                            break;

                        case "Cuba" : marker = L.marker(new L.LatLng(data.results[0].latitude, data.results[0].longitude), {
                            icon:	new L.NumberedDivIcon({number: size, iconUrl : iconShade})        										});

//marker.bindPopup("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                            marker.on('click', function () {

                                $("#sidebar").html("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                                sidebar.show();

                            });
                            jamaica.addLayer(marker);

                            break;

                        case "Haiti" : marker = L.marker(new L.LatLng(data.results[0].latitude, data.results[0].longitude), {
                            icon:	new L.NumberedDivIcon({number: size, iconUrl : iconShade})        										});

//marker.bindPopup("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                            marker.on('click', function () {

                                $("#sidebar").html("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                                sidebar.show();

                            });
                            haiti.addLayer(marker);

                            break;

                        case "Anguilla" : marker = L.marker(new L.LatLng(data.results[0].latitude, data.results[0].longitude), {
                            icon:	new L.NumberedDivIcon({number: size, iconUrl : iconShade})        										});

//marker.bindPopup("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                            marker.on('click', function () {

                                $("#sidebar").html("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                                sidebar.show();

                            });
                            anguilla.addLayer(marker);

                            break;

                        case "Grenada" : marker = L.marker(new L.LatLng(data.results[0].latitude, data.results[0].longitude), {
                            icon:	new L.NumberedDivIcon({number: size, iconUrl : iconShade})        										});

//marker.bindPopup("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                            marker.on('click', function () {

                                $("#sidebar").html("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                                sidebar.show();

                            });
                            grenada.addLayer(marker);

                            break;

                        case "Montserrat" : marker = L.marker(new L.LatLng(data.results[0].latitude, data.results[0].longitude), {
                            icon:	new L.NumberedDivIcon({number: size, iconUrl : iconShade})        										});

//marker.bindPopup("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                            marker.on('click', function () {

                                $("#sidebar").html("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                                sidebar.show();

                            });
                            montserrat.addLayer(marker);

                            break;

                        case "Saint Lucia" : marker = L.marker(new L.LatLng(data.results[0].latitude, data.results[0].longitude), {
                            icon:	new L.NumberedDivIcon({number: size, iconUrl : iconShade})        										});

//marker.bindPopup("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                            marker.on('click', function () {

                                $("#sidebar").html("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                                sidebar.show();

                            });
                            saintlucia.addLayer(marker);

                            break;

                        case "Saint Vincent" : marker = L.marker(new L.LatLng(data.results[0].latitude, data.results[0].longitude), {
                            icon:	new L.NumberedDivIcon({number: size, iconUrl : iconShade})        										});

//marker.bindPopup("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                            marker.on('click', function () {

                                $("#sidebar").html("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                                sidebar.show();

                            });
                            saintvincent.addLayer(marker);

                            break;

                        case "Dominica" : marker = L.marker(new L.LatLng(data.results[0].latitude, data.results[0].longitude), {
                            icon:	new L.NumberedDivIcon({number: size, iconUrl : iconShade})        										});

//marker.bindPopup("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                            marker.on('click', function () {

                                $("#sidebar").html("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                                sidebar.show();

                            });
                            dominica.addLayer(marker);

                            break;

                        case "Antigua and Barbuda" : marker = L.marker(new L.LatLng(data.results[0].latitude, data.results[0].longitude), {
                            icon:	new L.NumberedDivIcon({number: size, iconUrl : iconShade})        										});

//marker.bindPopup("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                            marker.on('click', function () {

                                $("#sidebar").html("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                                sidebar.show();

                            });
                            antigua.addLayer(marker);

                            break;

                        case "Trinidad and Tobago" : marker = L.marker(new L.LatLng(data.results[0].latitude, data.results[0].longitude), {
                            icon:	new L.NumberedDivIcon({number: size, iconUrl : iconShade})        										});

//marker.bindPopup("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                            marker.on('click', function () {

                                $("#sidebar").html("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                                sidebar.show();

                            });
                            trinidad.addLayer(marker);

                            break;

                        case "Saint Kitts" : marker = L.marker(new L.LatLng(data.results[0].latitude, data.results[0].longitude), {
                            icon:	new L.NumberedDivIcon({number: size, iconUrl : iconShade})        										});

//marker.bindPopup("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                            marker.on('click', function () {

                                $("#sidebar").html("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                                sidebar.show();

                            });
                            saintkitts.addLayer(marker);

                            break;

                        case "Belize" : marker = L.marker(new L.LatLng(data.results[0].latitude, data.results[0].longitude), {
                            icon:	new L.NumberedDivIcon({number: size, iconUrl : iconShade})        										});

//marker.bindPopup("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                            marker.on('click', function () {

                                $("#sidebar").html("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                                sidebar.show();

                            });
                            belize.addLayer(marker);

                            break;

                        case "Guyana" : marker = L.marker(new L.LatLng(data.results[0].latitude, data.results[0].longitude), {
                            icon:	new L.NumberedDivIcon({number: size, iconUrl : iconShade})        										});

//marker.bindPopup("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                            marker.on('click', function () {

                                $("#sidebar").html("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                                sidebar.show();

                            });
                            guyana.addLayer(marker);

                            break;

                        case "Suriname" : marker = L.marker(new L.LatLng(data.results[0].latitude, data.results[0].longitude), {
                            icon:	new L.NumberedDivIcon({number: size, iconUrl : iconShade})        										});

//marker.bindPopup("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                            marker.on('click', function () {

                                $("#sidebar").html("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                                sidebar.show();

                            });
                            suriname.addLayer(marker);

                            break;

                        case "Grenada" : marker = L.marker(new L.LatLng(data.results[0].latitude, data.results[0].longitude), {
                            icon:	new L.NumberedDivIcon({number: size, iconUrl : iconShade})        										});

//marker.bindPopup("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                            marker.on('click', function () {

                                $("#sidebar").html("Name : " + name + "<br><br>Type : " + type + "<br><br>Website : " + url + "<br><br>Functional Area : " + functional_area);

                                sidebar.show();

                            });
                            grenada.addLayer(marker);

                            break;


                    }

                    //

                    //var markers = new L.MarkerClusterGroup();

                }

            });


        }


    </script>

    <style>

        #map {

            height: 600px;

        }

        .leaflet-div-icon {
            background: transparent;
            border: none;
        }

        .leaflet-marker-icon .number{
            position: relative;
            top: -37px;
            font-size: 12px;
            width: 25px;
            text-align: center;
        }

    </style>

</head>

<body>

<div id="sidebar">
    <h1></h1>
</div>

<script src='https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/leaflet.markercluster.js'></script>

<link href='https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/MarkerCluster.css' rel='stylesheet' />

<link href='https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/MarkerCluster.Default.css' rel='stylesheet' />

<div id="map"></div>

<script>



    var jamaica = new L.MarkerClusterGroup({maxClusterRadius: 60,
        iconCreateFunction: null,
        spiderfyOnMaxZoom: true,
        showCoverageOnHover: true,
        zoomToBoundsOnClick: false});

    jamaica.on('clusterclick', function (a) {
        a.layer.spiderfy();
    });

    var barbados = new L.MarkerClusterGroup({maxClusterRadius: 60,
        iconCreateFunction: null,
        spiderfyOnMaxZoom: true,
        showCoverageOnHover: true,
        zoomToBoundsOnClick: false});

    barbados.on('clusterclick', function (a) {
        a.layer.spiderfy();
    });

    var bahamas = new L.MarkerClusterGroup({maxClusterRadius: 60,
        iconCreateFunction: null,
        spiderfyOnMaxZoom: true,
        showCoverageOnHover: true,
        zoomToBoundsOnClick: false});

    bahamas.on('clusterclick', function (a) {
        a.layer.spiderfy();
    });

    var cuba = new L.MarkerClusterGroup({maxClusterRadius: 60,
        iconCreateFunction: null,
        spiderfyOnMaxZoom: true,
        showCoverageOnHover: true,
        zoomToBoundsOnClick: false});

    cuba.on('clusterclick', function (a) {
        a.layer.spiderfy();
    });

    var haiti = new L.MarkerClusterGroup({maxClusterRadius: 60,
        iconCreateFunction: null,
        spiderfyOnMaxZoom: true,
        showCoverageOnHover: true,
        zoomToBoundsOnClick: false});

    haiti.on('clusterclick', function (a) {
        a.layer.spiderfy();
    });

    var anguilla = new L.MarkerClusterGroup({maxClusterRadius: 60,
        iconCreateFunction: null,
        spiderfyOnMaxZoom: true,
        showCoverageOnHover: true,
        zoomToBoundsOnClick: false});

    anguilla.on('clusterclick', function (a) {
        a.layer.spiderfy();
    });



    var grenada = new L.MarkerClusterGroup({maxClusterRadius: 60,
        iconCreateFunction: null,
        spiderfyOnMaxZoom: true,
        showCoverageOnHover: true,
        zoomToBoundsOnClick: false});

    grenada.on('clusterclick', function (a) {
        a.layer.spiderfy();
    });

    var montserrat = new L.MarkerClusterGroup({maxClusterRadius: 60,
        iconCreateFunction: null,
        spiderfyOnMaxZoom: true,
        showCoverageOnHover: true,
        zoomToBoundsOnClick: false});

    montserrat.on('clusterclick', function (a) {
        a.layer.spiderfy();
    });

    var saintlucia = new L.MarkerClusterGroup({maxClusterRadius: 60,
        iconCreateFunction: null,
        spiderfyOnMaxZoom: true,
        showCoverageOnHover: true,
        zoomToBoundsOnClick: false});

    saintlucia.on('clusterclick', function (a) {
        a.layer.spiderfy();
    });

    var saintvincent = new L.MarkerClusterGroup({maxClusterRadius: 60,
        iconCreateFunction: null,
        spiderfyOnMaxZoom: true,
        showCoverageOnHover: true,
        zoomToBoundsOnClick: false});

    saintvincent.on('clusterclick', function (a) {
        a.layer.spiderfy();
    });

    var trinidad = new L.MarkerClusterGroup({maxClusterRadius: 60,
        iconCreateFunction: null,
        spiderfyOnMaxZoom: true,
        showCoverageOnHover: true,
        zoomToBoundsOnClick: false});

    trinidad.on('clusterclick', function (a) {
        a.layer.spiderfy();
    });

    var dominica = new L.MarkerClusterGroup({maxClusterRadius: 60,
        iconCreateFunction: null,
        spiderfyOnMaxZoom: true,
        showCoverageOnHover: true,
        zoomToBoundsOnClick: false});

    dominica.on('clusterclick', function (a) {
        a.layer.spiderfy();
    });

    var antigua = new L.MarkerClusterGroup({maxClusterRadius: 60,
        iconCreateFunction: null,
        spiderfyOnMaxZoom: true,
        showCoverageOnHover: true,
        zoomToBoundsOnClick: false});

    antigua.on('clusterclick', function (a) {
        a.layer.spiderfy();
    });

    var saintkitts = new L.MarkerClusterGroup({maxClusterRadius: 60,
        iconCreateFunction: null,
        spiderfyOnMaxZoom: true,
        showCoverageOnHover: true,
        zoomToBoundsOnClick: false});

    saintkitts.on('clusterclick', function (a) {
        a.layer.spiderfy();
    });

    var belize = new L.MarkerClusterGroup({maxClusterRadius: 60,
        iconCreateFunction: null,
        spiderfyOnMaxZoom: true,
        showCoverageOnHover: true,
        zoomToBoundsOnClick: false});

    belize.on('clusterclick', function (a) {
        a.layer.spiderfy();
    });

    var guyana = new L.MarkerClusterGroup({maxClusterRadius: 60,
        iconCreateFunction: null,
        spiderfyOnMaxZoom: true,
        showCoverageOnHover: true,
        zoomToBoundsOnClick: false});

    guyana.on('clusterclick', function (a) {
        a.layer.spiderfy();
    });

    var suriname = new L.MarkerClusterGroup({maxClusterRadius: 60,
        iconCreateFunction: null,
        spiderfyOnMaxZoom: true,
        showCoverageOnHover: true,
        zoomToBoundsOnClick: false});

    suriname.on('clusterclick', function (a) {
        a.layer.spiderfy();
    });

    var grenada = new L.MarkerClusterGroup({maxClusterRadius: 60,
        iconCreateFunction: null,
        spiderfyOnMaxZoom: true,
        showCoverageOnHover: true,
        zoomToBoundsOnClick: false});

    grenada.on('clusterclick', function (a) {
        a.layer.spiderfy();
    });



    //

    L.NumberedDivIcon = L.Icon.extend({
        options: {
            // EDIT THIS TO POINT TO THE FILE AT http://www.charliecroom.com/marker_hole.png (or your own marker)
            iconUrl: 'http://www.charliecroom.com/marker_hole.png',
            number: '',
            shadowUrl: null,
            iconSize: new L.Point(25, 41),
            iconAnchor: new L.Point(13, 41),
            popupAnchor: new L.Point(0, -33),
            /*
             iconAnchor: (Point)
             popupAnchor: (Point)
             */
            className: 'leaflet-div-icon'
        },

        createIcon: function () {
            var div = document.createElement('div');
            var img = this._createImg(this.options['iconUrl']);
            var numdiv = document.createElement('div');
            numdiv.setAttribute ( "class", "number" );
            numdiv.innerHTML = this.options['number'] || '';
            div.appendChild ( img );
            div.appendChild ( numdiv );
            this._setIconStyles(div, 'icon');
            return div;
        },

        //you could change this to add a shadow like in the normal marker if you really wanted
        createShadow: function () {
            return null;
        }
    });

    //




    var map = L.map('map').setView([14.06, -74.09], 5);
    //https://a.tiles.mapbox.com/v4/nickjwill.lcnch31p/page.html?access_token=pk.eyJ1Ijoibmlja2p3aWxsIiwiYSI6Im4xQWFQeTQifQ.bwI5KQmy7z7kS9woXzbplw#6/31.625/40.463
    L.tileLayer('http://{s}.tiles.mapbox.com/v4/nickjwill.lcnc6kpo/{z}/{x}/{y}.png?access_token=pk.eyJ1Ijoibmlja2p3aWxsIiwiYSI6Im4xQWFQeTQifQ.bwI5KQmy7z7kS9woXzbplw', {
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
        maxZoom: 8,
        minZoom: 5
    }).addTo(map);

    getEverything();

    map.addLayer(jamaica);

    map.addLayer(bahamas);

    map.addLayer(belize);

    map.addLayer(barbados);

    map.addLayer(cuba);map.addLayer(anguilla);map.addLayer(haiti);map.addLayer(grenada);

    map.addLayer(montserrat);map.addLayer(saintlucia);map.addLayer(saintvincent);map.addLayer(trinidad);

    map.addLayer(dominica);map.addLayer(antigua);map.addLayer(saintkitts);map.addLayer(belize);

    map.addLayer(guyana);map.addLayer(suriname);map.addLayer(grenada);

    var sidebar = L.control.sidebar('sidebar', {
        position: 'left'
    });

    map.addControl(sidebar);

    //

    map.on('click', function () { sidebar.hide(); });

</script>

<br><b><p style="display:inline;">Key : </p></b>

<img src="http://www.argentmac.com/devca/icons/Emerald.png"/> Bank/Investment/Consulting&nbsp;

<img src="http://www.argentmac.com/devca/icons/cloud.png"/> Government&nbsp;

<img src="http://www.argentmac.com/devca/icons/wetasphalt.png"/> Education/Research&nbsp;

<img src="http://www.argentmac.com/devca/icons/sunflower.png"/> NGO&nbsp;

<img src="http://www.argentmac.com/devca/icons/Silver.png"/> ICT Vendor&nbsp;

<img src="http://www.argentmac.com/devca/icons/Pongrante.png"/> MNO/Telecommunications&nbsp;

<img src="http://www.argentmac.com/devca/icons/Ametheyst.png"/> Media/Marketing&nbsp;

<br><br>

<a href="/stakeholders">View/Add/Edit/Delete Stakeholders</a> || View/Add/Edit/Delete Initiatives

</body>

</html>

