<?php
	$plant = $_GET['plant']
	$mail = $_GET['email']
	$regID = $_GET['regID']
	$resp = ''
	$con = mysqli_connect ( "localhost", "udaykd099", "099udaykd", "Bodhi_UserData" );
	if (! $con) {
		$resp = "Failed to connect to MySQL: " . mysqli_connect_error ();
	}
	// inserting record
	$sql1 = "INSERT INTO user_data (mail, plant, regID) VALUES ('$mail','$plant','$regID')";
		
	if (! mysqli_query ( $con, $sql1 )) {
		die ( 'Error: ' . mysqli_error ( $con ) );
	}
		$resp = "Updated Successfully";
	} else {
		$resp = "Error in Updating Database, Please retry!";
	}
	// header ( "Location: send_resp_gcm.php?resp=" . $resp . "&regID=" . $regID );
	include 'send_resp_gcm.php';
?>