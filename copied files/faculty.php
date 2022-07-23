<?php
header("access-control-allow-origin:*");
header("access-control-allow-method:POST,GET,OPTIONS");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myproject";

$name=$_GET['t1'];
$phone=$_GET['t2'];
$address=$_GET['t3'];
$specialization=$_GET['t4'];
// $email=$_GET['t5'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO faculty(name, phone ,address,specialization)
VALUES ('$name', '$phone', '$address','$specialization')";
$json_array = array();

if ($conn->query($sql) === TRUE) {
    $json_array=array('response'=>"yes");
    // $json_array[]= $row;
//   echo "New record created successfully";
} 
else {
    $json_array=array('response'=> mysqli_error($conn));
//   echo "Error: " . $sql . "<br>" . $conn->error;
}
echo json_encode($json_array);


$conn->close();
?>