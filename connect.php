 <?php
//$connection = mysql_connect("localhost");
?>
<?php
$servername = "localhost";
$username = "baxstef";
$password = "baxstef";

// Create connection
$conn = mysql_connect($servername, $username, $password);

// Check connection
$db = mysql_select_db("fon01", $conn);
if (!$db) {
  // die('Connection failed.' . mysql_error());
 }else{
//echo "Connected successfully";
    
}
?>