<?php
	$plant = $_POST ['plant'];
	$mail = $_POST ['mail'];
	$regID = $_POST ['regId'];
	$city = $_POST ['city'];
	$resp = '';
	$con = mysqli_connect ( "localhost", "udaykd099", "099udaykd", "Bodhi_UserData" );
	if (! $con) {
		$resp = "Response Failed to connect to MySQL: " . mysqli_connect_error ();
	}
	// inserting record
	$sql1 = "INSERT INTO user_data (mail, plant, regID, city) VALUES ('$mail','$plant','$regID','$city')";
		
	if (! mysqli_query ( $con, $sql1 )) {
		die ( 'Error: ' . mysqli_error ( $con ) );
	} else {
		$resp = "Response : " . $plant . " Added Successfully";
	}
	include 'send_resp_gcm.php';
?>