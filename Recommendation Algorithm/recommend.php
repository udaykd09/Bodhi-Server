<?php
  include 'moisture_estimation.php';
  include 'plant_soil_moisture_requirement.php';
  include 'live_weather_prediction.php';
  /*
    This function takes as input the following user details.
    1) city  2)plant_name in user's garden  3)soil moisture value in user's garden
    The output of this function is:
    True : if needs watering
    False: if does not need watering
  */
  function recommend_algo($city="Sunnyvale",$plant_name="ABC",$moisture="100"){
  echo $city." ".$plant_name." ".$moisture;
  if ($city!=NULL || !empty($city)){
  	$weather_cond = live_weather_pred($city);
  }else{
  	$weather_cond = NULL;
  }
  $weather_sum = "Weather prediction is " . $weather_cond;
  if ($plant_name!=NULL || !empty($plant_name)){
  	$plant_moisture_req = required_soil_moisture($plant_name);
  }else{
  	return "Plant Name is empty";
  }
  if ($moisture!=NULL || !empty($moisture)){
  	$moisture_lvl = moisture_level($moisture);
  }else{
  	return "Moisture value is empty";
  }
  
  //echo $weather_cond." ".$plant_moisture_req." ".$moisture_lvl." ";
  // If condition is rain or moisture level is high. Dont water.
  // If moisture level is low, plant requirement is moist. Water.
  // If moisture level is medium, plan requirement is moist. Water.
  // If moisture level is meidum, plant requirement is dry. Dont water.
  // If moisture level is dry, plant requirement is dry. Dont water.
  if ($weather_cond == "Rain") {
    return "Rain";
  } else if ($moisture_lvl == "high"){
  
    return "False";
  }
  else if (($moisture_lvl == "low" || $moisture_lvl == "medium") && $plant_moisture_req == "moist") {
    return "True";
  } else if ($moisture_lvl == "medium" && $plant_moisture_req == "dry") {
    return "False";
  } else{
    //echo "hello";
    return "True";
  }
  }
  print_r(recommend_algo());
?>