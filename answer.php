<?php
header("access-control-allow-origin:*");
header("access-control-allow-method:POST,GET,OPTIONS");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myproject";

$year=$_GET['year'];
$branch=$_GET['branch'];
$subject=$_GET['subject'];
$file=$_GET['add_file'];
// $tm=$_FILES['add_file']['tmp_name'];
// move_uploaded_file($tm,"question_pdf/". $add_file);

// $email=$_GET['t5'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO answer(year, branch ,subject, add_file)
VALUES ('$year', '$branch', '$subject','$file')";
$json_array = array();

if ($conn->query($sql) === TRUE) {
    $json_array=array('response'=>"yes");
      // $json_array=array(year=>'$year',branch=>'$branch',subject=>'$subject',add_file=>'$file');
} 
else {
    $json_array=array('response'=> mysqli_error($conn));
}
echo json_encode($json_array);

$conn->close();
?>