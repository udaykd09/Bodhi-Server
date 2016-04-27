<?php
  $city = $_GET['city'];
  $jsonurl = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "&appid=3188f906a781b8e7a1312bc5b2a0a59f";
  $json = file_get_contents($jsonurl);
  $cweather = json_decode($json);
  $kelvin = $cweather->main->temp;
  $fheat = ($kelvin - 273.15) * 1.8 + 32;
  echo  "Temperature : " . $fheat . " fahrenheit."; 
  echo "<br>";
  $humidity = $cweather->main->humidity;
  echo "Humidity : " . $humidity;
  echo "<br>";
  echo "Weather condition : ";
  foreach($cweather->weather as $weath) {
        $rain = $weath->main . ", " . $weath->description;
        echo $rain;
  }
?>
