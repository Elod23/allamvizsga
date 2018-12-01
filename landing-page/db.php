<?php
//credentials
$conn = mysqli_connect("localhost","root","LeBr0ncav$","projekt_allamvizsga");
//check
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL:".mysqli_connect_error();
}
?>