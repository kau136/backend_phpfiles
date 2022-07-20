<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myproject";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else
{
    $DIR = "/image";
    $httpPost = file_get_contents("php://input");
    $req = json_decode($httpPost);
    $file_chunks = explode(";base64,", $req->name);
       
    $fileType = explode("image/", $file_chunks[0]);
    $image_type = $fileType[1];
    $base64Img = base64_decode($file_chunks[1]);
    
    $file = $DIR . uniqid() . '.png';
    file_put_contents($file, $base64Img); 

}
?>
<html>
    <body>
    <form >			
    <input type="file" name="image" /><br>
    <input type='submit'/>
    </form>

</body>
</html>