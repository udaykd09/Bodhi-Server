<?php
	$alerts = array();
	$regIDs = array();
	$con = mysqli_connect ( "localhost", "udaykd099", "099udaykd", "Bodhi_UserData" );
	$sql1 = "SELECT mail, regID, plant, moisture, city FROM user_data";
	$result = mysqli_query ( $con, $sql1 );
	//Iterate the result
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $soil_moisture = '';
        $resp = '';
        if (!empty($row['plant'])) {
            $soil_moisture = $row['moisture'];
            $water_flag = True; //Check if Need to water
            echo $water_flag;
            if ($water_flag == TRUE) {
                $alerts['m'] = $row['plant'];
                array_push($regIDs, $row['regID']);
            }
        }
    	}
    	include 'send_notif_gcm.php';	
?>