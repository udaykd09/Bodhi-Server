<html><body>
<?php
$mail = $_POST ['email'];
$plant = $_POST ['plant'];
$moisture = $_POST ['moisture'];
$con = mysqli_connect ( "localhost", "udaykd099", "099udaykd", "Bodhi_UserData" );
if (! $con) {
	$resp = "Failed to connect to MySQL: " . mysqli_connect_error ();
}
// Updating record
$sql1 = "UPDATE user_data SET moisture='$moisture' WHERE mail='$mail' AND plant='$plant'";	
if (! mysqli_query ( $con, $sql1 )) {
$resp = "Response Error";	
die ( 'Error: ' . mysqli_error ( $con ) );
} else {
$resp = "Response : " . $mail . " Moisture updated Successfully";
} 
echo $resp;
//include 'recommend.php';
?></body></html>