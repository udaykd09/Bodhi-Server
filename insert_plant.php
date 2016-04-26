<?php
	$plant = $_POST ['plant'];
	$mail = $_POST ['email'];
	$regID = $_POST ['regId'];
	$resp = '';
	$con = mysqli_connect ( "localhost", "udaykd099", "099udaykd", "Bodhi_UserData" );
	if (! $con) {
		$resp = "Failed to connect to MySQL: " . mysqli_connect_error ();
	}
	// inserting record
	$sql1 = "INSERT INTO user_data (mail, plant, regID) VALUES ('$mail','$plant','$regID')";
		
	if (! mysqli_query ( $con, $sql1 )) {
		die ( 'Error: ' . mysqli_error ( $con ) );
	} else {
		$resp = "Updated Successfully";
	}
	include 'send_resp_gcm.php';
?>