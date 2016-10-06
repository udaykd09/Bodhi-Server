<?php
  function live_weather_pred($city) {
    $jsonurl = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "&appid=3188f906a781b8e7a1312bc5b2a0a59f";
    $json = file_get_contents($jsonurl);
    $cweather = json_decode($json);
    $kelvin = $cweather->main->temp;
    $fheat = ($kelvin - 273.15) * 1.8 + 32;
    $humidity = $cweather->main->humidity;
    $weather_cond = "";
    foreach($cweather->weather as $weath) {
          $weather_cond = $weath->main;
          return $weather_cond;
    }
    return "sunny";
  }
?>
