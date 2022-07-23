<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myproject";

$fname=$_GET['fname'];
$lname=$_GET['lname'];
$email=$_GET['email'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO student(fname, lname, email)
VALUES ('$fname', '$lname', '$email')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>