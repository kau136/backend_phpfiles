<?php
header("access-control-allow-origin:*");
header("access-control-allow-method:POST,GET,OPTIONS");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myproject";


$email=$_GET['t1'];
$ppassword=$_GET['t2'];
$cpassword=$_GET['t3'];
$role=$_GET['t4'];
// $email=$_GET['t5'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO registration(email,password,cpassword,role)
VALUES ('$email', '$ppassword', '$cpassword','$role')";
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