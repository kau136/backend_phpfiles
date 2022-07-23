<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myproject";
// $fname=$_GET['fname'];
// $lname=$_GET['lname'];
// $email=$_GET['email'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

$sql = "SELECT id, fname, lname ,email FROM student";
$result = $conn->query($sql);
$json_array = array();


if($result->num_rows>0){
  // output data of each row
  while($row = mysqli_fetch_assoc($result))
   {
    $json_array[]= $row;
    // echo "id: " . $row["id"]. " - Name: " . $row["fname"]. "  " . $row["lname"]."  "."-email: " . $row["email"]. "<br>";
    }
}
//echo "<pre>";
//print_r($json_array);
//echo "</pre>";
print(json_encode($json_array));

?>






