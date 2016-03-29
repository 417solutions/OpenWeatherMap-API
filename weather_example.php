<?php

// http://openweathermap.org/api

define("APPID","YOUR_API_KEY");

$weather = get_weather_by_location('cancun,mx');
// $weather = get_weather_by_id('3531673');

print "<p>";
	print $weather['weather']['0']['main'];
	print " <span style='color:#999;'>(".ucwords($weather['weather']['0']['description']).")</span>";
	print " <b>".$weather['main']['temp']."&deg;F</b>";
	print "<img src='http://openweathermap.org/img/w/".$weather['weather']['0']['icon'].".png'>";
print "</p>";

print "<pre>";
print_r($weather);
print "</pre>";

function get_weather_by_location($location){
	$options = array(
		'http' => array(
			'method'  => 'GET'
			)
		);
	$context  = stream_context_create($options);
	$content = json_decode(file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$location."&units=imperial&APPID=".APPID),true);
	return $content;
}
function get_weather_by_id($id){
	$options = array(
		'http' => array(
			'method'  => 'GET'
			)
		);
	$context  = stream_context_create($options);
	$content = json_decode(file_get_contents("http://api.openweathermap.org/data/2.5/weather?id=".$id."&units=imperial&APPID=".APPID),true);
	return $content;
}
