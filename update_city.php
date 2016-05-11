<?php
	$mail = $_POST ['mail'];
	$regID = $_POST ['regId'];
	$city = $_POST ['city'];
	$resp = '';
	$con = mysqli_connect ( "localhost", "udaykd099", "099udaykd", "Bodhi_UserData" );
	if (! $con) {
		$resp = "Response Failed to connect to MySQL: " . mysqli_connect_error ();
	}
	// inserting record
	$sql1 = "UPDATE user_data SET city='$city' WHERE mail='$mail'";
		
	if (! mysqli_query ( $con, $sql1 )) {
		die ( 'Error: ' . mysqli_error ( $con ) );
	} else {
		$resp = "Response : " . $city . " Updated Successfully";
	}
	include 'send_resp_gcm.php';
?>