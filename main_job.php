<?php
	$con = mysqli_connect ( "localhost", "udaykd099", "099udaykd", "Bodhi_UserData" );
	$sql1 = "SELECT mail, regID, plant FROM user_data";
	$result = mysqli_query ( $con, $sql1 );
	//Iterate the result
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $soil_moisture = '';
        $resp = '';
        if (isset($row['plant'])) {
            $soil_moisture = ''; //Get Soil Moisture
            $water_flag = ''; //Check if Need to water
            if ($water_flag == TRUE) {
                $alert = "Time";
                $regID = $row['regID'];
                include 'send_notif_gcm.php';
            }
        }
    }
?>