<?php
$mail = $_POST ['mail'];
$regID = $_POST ['regId'];
$city = $_POST ['city'];
$resp = '';
$con = mysqli_connect ( "localhost", "udaykd099", "099udaykd", "Bodhi_UserData" );
if (! $con) {
	$resp = "Failed to connect to MySQL: " . mysqli_connect_error ();
}
// inserting record
$sql1 = "INSERT INTO user_data (mail, regID) VALUES ('$mail','$regID')";	
if (! mysqli_query ( $con, $sql1 )) {
$resp = "Response Error";	
die ( 'Error: ' . mysqli_error ( $con ) );
} else {
$resp = "Response : " . $mail . " User Added Successfully";
} 
echo $resp;
include 'send_resp_gcm.php';
?>