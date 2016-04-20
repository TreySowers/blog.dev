@extends('layouts.master')

@section('top-script')
	<title>Weather Map</title>
	<style>
            body {
                background-color: #77CCFF;
            }

            .col-md-4 {
                background-color: #E8E8E8;
            }

            #map-canvas {
                margin: 10px auto;
                width: 770px;
                height: 481px;
            }

        </style>
@stop

@section('content')
<body>
<main id="container">

	<h1>Weather Application</h1>
    <input id="addressForm" type="text" name="latitude" placeholder="Input address"> </input>
    <input id="addAddress" type="submit" value="Submit"></input>

    <h3 id="your_city"></h3>
</main>

<div id="map-canvas"></div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAP9ajxYdOUTiGEF5N-u_MVUurqUBfkl-M"></script>

	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script>
		"use strict"
         var addressInput = "600 navarro, 78205";
         getWeather()
        function handleForecastData(data) {
            console.log(data);
            var contentString = '';

            contentString += "<h3>" + data.city.name + "</h3>";

            data.list.forEach(function(forecast, index, array){
                contentString += "<div class='col-md-4'>";
                contentString += "<p>Temp: " + forecast.main.temp_min + "</p>";
                contentString += "<img src='http://openweathermap.org/img/w/" + forecast.weather[0].icon + ".png'" + "</p>";
                contentString += "<p>Description: " + forecast.weather[0].description + "</p>";
                contentString += "<p>Humidity: " + forecast.main.humidity + "</P>";
                contentString += "<p>Pressure: " + forecast.main.pressure + "</p>";
                contentString += "<p>Wind: " + forecast.wind.speed + "</p>";
                contentString += "</div>";
            });
                return contentString;

            // contentString += "<form>";
            // contentString += "<input id=\"addressForm\" type=\"text\" name=\"latitude\" placeholder=\"Input address\">"  + "<input id=\"addAddress\" type=\"submit\" value=\"Submit\">";
            // contentString += "</form>";
       
         } 
         $('#addAddress').on("click",function(event){

            addressInput = $("#addressForm").val();
            getWeather()
             console.log(addressInput)
         })
         $('#addressForm').keydown(function(event){
            if (event.keyCode == 13) {
                 addressInput = $("#addressForm").val();
                 getWeather()
                  console.log(addressInput)
            };
           
         })

		function getWeather(){
            $.get("http://api.openweathermap.org/data/2.5/forecast", {
    		APPID: "71ad0abe818246e8585d2f70460155f1",
    		q:     addressInput,
    		units: "imperial",
    		cnt: 3
    	   }).done(function(data) {
          
            console.log(handleForecastData(data));
            $("main").append(handleForecastData) 
  
		}).fail(function(data) {
            console.log(data);
        });
    }
    
        var mapOptions = {
            
            zoom: 4,

            center: {
                lat:  29.4284595,
                lng: -98.492433
            }
        };

        var addressHome = addressInput;

            var marker;

            var geocoder = new google.maps.Geocoder();

            geocoder.geocode({ "address": addressHome }, function(results, status) {

               if (status == google.maps.GeocoderStatus.OK) {

                   map.setCenter(results[0].geometry.location);
               } else {

                   alert("Geocoding was not successful - STATUS: " + status);
               }
            });

            geocoder.geocode({ "address": addressHome }, function(results, status) {

               if (status == google.maps.GeocoderStatus.OK) {

                   marker = new google.maps.Marker({
                        position: results[0].geometry.location,
                        map: map,
                        draggable: true,
                        animation: google.maps.Animation.Bounce
                    });

                   marker.addListener('dragend', function() {
                        map.setZoom(4);
                        map.setCenter(marker.getPosition());
                    });

               } else {

                   alert("Geocoding was not successful - STATUS: " + status);
               }
            });          

        var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions); 
        
    </script>

	
@stop