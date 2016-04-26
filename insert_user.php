<?php
$mail = $_POST ['email'];
$regID = $_POST ['regId'];
$resp = '';
$con = mysqli_connect ( "localhost", "udaykd099", "099udaykd", "Bodhi_UserData" );
if (! $con) {
	$resp = "Failed to connect to MySQL: " . mysqli_connect_error ();
}
// inserting record
$sql1 = "INSERT INTO user_data (mail, regID) VALUES ('$mail','$regID')";	
if (! mysqli_query ( $con, $sql1 )) {
$resp = "Error in Updating Database, Please retry!";	
die ( 'Error: ' . mysqli_error ( $con ) );
} else {
$resp = "Updated Successfully";
} 
include 'send_resp_gcm.php';
?>