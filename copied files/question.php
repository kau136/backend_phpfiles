<?php
header("access-control-allow-origin:*");
header("access-control-allow-method:POST,GET,OPTIONS");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myproject";


$year=$_GET['t1'];
$branch=$_GET['t2'];
$subject=$_GET['t3'];
$file=$_GET['t4'];
$File_name=$_FILES['t4'];
$ext=explode(".", $File_name);
$tmp=count($ext);
if($ext[$tmp-1]=='jpg'|| $ext[$tmp-1]=='png'|| $ext[$tmp-1]=='jpeg'|| $ext[$tmp-1]=='pdf'){
    $File_tmp=$_FILES['t4']['tmp_name'];
    move_uploaded_file($File_tmp,"upload-images/".$File_name);
}



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO question(year, branch ,subject, add_file)
VALUES ('$year', '$branch', '$subject','$file')";
$json_array = array();

if ($conn->query($sql) === TRUE) {
    $json_array=array('response'=>"yes");
} 
else {
    $json_array=array('response'=> mysqli_error($conn));
 
}
echo json_encode($json_array);

$conn->close();
?>