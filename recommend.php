<?php
  include 'moisture_estimation.php';
  include 'plant_water_requirement.php';
  include 'live_weather_prediction.php';
  $city = $_GET['city'];
  $weather_cond = live_weather_pred($city);
  $weather_sum = "Weather prediction is " . $weather_cond;
  $plant_name = $_GET['plantname'];
  $plant_water_req = required_waterlevel($plant_name);
  $moisture = $_GET['moisture'];
  $moisture_lvl = moisture_level($moisture);
 
  // If condition is rain or moisture level is high. Dont water.
  // If moisture level is low, plant is moist. Water.
  // If moisture level is medium, plan is moist. Water.
  // If moisture level is meidum, plant is dry. Dont water.
  if ($weather_cond == "rain" || $moisture_lvl == "high") {
    echo "Don't water. " . $weather_sum;
  } else if (($moisture_lvl == "low" || $moisture_lvl == "medium") && $plant_water_req == "moist") {
    echo "Please water. " . $weather_sum;
  } else if ($moisture_lvl == "medium" && $plant_water_req == "dry") {
    echo "Don't water. " . $weather_sum;
  } else {
    echo "Please water. " . $weather_sum;
  }
?>
