<?php
	include 'Recommendation Algorithm/recommend.php';

   	function sendMessageThroughGCM($regIDs, $alerts) {
		//Google cloud messaging GCM-API url
        	$url = 'https://android.googleapis.com/gcm/send';
        	$fields = array(
            	'registration_ids' => $regIDs,
            	'data' => $alerts,
        	);
		// Update your Google Cloud Messaging API Key
		define("GOOGLE_API_KEY", "AIzaSyDmr-I-SuRJ0ZKcWL03lhoep4755JHD_A4"); 		
        	$headers = array(
            		'Authorization: key=' . GOOGLE_API_KEY,
            		'Content-Type: application/json'
        	);
        	$ch = curl_init();
        	curl_setopt($ch, CURLOPT_URL, $url);
        	curl_setopt($ch, CURLOPT_POST, true);
        	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);	
        	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        	$result = curl_exec($ch);				
        	if ($result === FALSE) {
            		die('Curl failed: ' . curl_error($ch));
        	}
        	curl_close($ch);
        	return $result;
    	}
	
	function main_job(){
		$con = mysqli_connect ( "localhost", "udaykd099", "099udaykd", "Bodhi_UserData" );
		$sql1 = "SELECT mail, regID, plant, moisture, city FROM user_data";
		$result = mysqli_query ( $con, $sql1 );
		//Iterate the result
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        	$soil_moisture = '';
        	$resp = '';
        	if ($row['plant']) {
        		$plant_name = $row['plant'];
            		$soil_moisture = $row['moisture']; //Get Soil Moisture
            		$city = $row['city'];  // Get city name
            		$water_flag = recommend_algo($city,$plant_name,$soil_moisture); //Check if Need to water
            		if ($water_flag == "True") {            
                		$alerts['m'] = $row['plant'];
                		$regIDs = array($row['regID']);             
                		echo $row['plant'];
                		$status = sendMessageThroughGCM($regIDs, $alerts);
            			echo $status;
            		} else if ($water_flag == "Rain") {            
                		$alerts['m'] = "Rain Alert: It is going to rain hence do not water!";
                		$regIDs = array($row['regID']);             
                		echo $row['plant'];
                		$status = sendMessageThroughGCM($regIDs, $alerts);
            			echo $status;
            		} else if (strpos($water_flag, 'empty') !== false) {            
                		$alerts['m'] = $water_flag;
                		$regIDs = array($row['regID']);             
                		echo $row['plant'];
                		$status = sendMessageThroughGCM($regIDs, $alerts);
            			echo $status;
            		}
        	}
    		}
    	}
    	main_job();   	
?>