<?php
$servername = "localhost";
$username = "pudaadam";
$password = "DvTk1974";
$dbname = "pudaadam";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>