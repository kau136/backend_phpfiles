<?php
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Method:POST,GET");
header("Access-Control-Allow-Headers:X-Requested-With");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myproject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM faculty where id=5";
$mysqli = mysqli_query($conn,$sql);
$json_data = array();

  // output data of each row
  while($row = mysqli_fetch_assoc($mysqli))
   {
    $json_data[]= $row;
    }

echo json_encode($json_data);
$conn->close();
?>







