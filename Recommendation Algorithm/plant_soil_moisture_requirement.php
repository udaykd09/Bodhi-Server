<?php
/*
    This function takes as input name of the plant
    and outputs it's soil moisture requirement
*/
  function required_soil_moisture($plant_name) {
    $con = mysqli_connect ( "localhost", "udaykd099", "099udaykd", "Bodhi_UserData" );
    if (! $con) {
	$resp = "Failed to connect to MySQL: " . mysqli_connect_error ();
	}
    $sql1 = "SELECT Soil_Moisture FROM Plant_Data where plant_name = '". $plant_name. "'";
    $result = mysqli_query ( $con, $sql1 );
    if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $required_moisture = $row['Soil_Moisture'];
        }
    else{
    	$required_moisture=0;
    }
    mysqli_close($con);
    return $required_moisture;
  }
  print_r(required_soil_moisture());
?>