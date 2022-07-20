<?php
header("access-control-allow-origin:*");
header("access-control-allow-method:POST,GET,OPTIONS");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myproject";

$email=$_GET['t1'];
$ppassword=$_GET['t2'];
// $role=$_GET['t3'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else
{
    $stmt=$conn->prepare("select * from registration where email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
    if($stmt_result->num_rows>0)
    {
        $data=$stmt_result->fetch_assoc();
        if($data['password']==$ppassword)
        {
        echo "<h1>Login successfully</h1>";
        }
        else{
            echo "<h1>Invalid Email and Password</h1>";

        }
    }
}
$conn->close();
?>