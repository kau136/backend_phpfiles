<?php

session_start();
// header('Content-Type: application/json; charset=utf-8');
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: PUT, GET, POST");
 
$response = array();
$upload_dir = 'uploads/';
$server_url = 'http://localhost/PHP-EXCEL/';

// include('dbconfig.php');
$con=mysqli_connect('localhost','root','','myproject');

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if($_FILES['avatar'])
{
    $avatar_name = $_FILES["avatar"]["name"];
    $avatar_tmp_name = $_FILES["avatar"]["tmp_name"];
    $error = $_FILES["avatar"]["error"];
 
    if($error > 0){
        $response = array(
            "status" => "error",
            "error" => true,
            "message" => "Error uploading the file!"
        );
    }else
    {
        $random_name = rand(1000,1000000)."-".$avatar_name;
        $upload_name = $upload_dir.strtolower($random_name);
        $upload_name = preg_replace('/\s+/', '-', $upload_name);
     
        if(move_uploaded_file($avatar_tmp_name , $upload_name)) {
            $response = array(
                "status" => "success",
                "error" => false,
                "message" => "File uploaded successfully",
                "url" => $server_url."/".$upload_name
              );
        }
       
    }
 
}
else{
    $response = array(
        "status" => "error",
        "error" => true,
        "message" => "No file was sent!"
    );
}
 


$fileName = $_FILES['avatar']['name'];

$file_ext = pathinfo($fileName, PATHINFO_EXTENSION);


 $allowed_ext = ['xls','csv','xlsx'];


if(in_array($file_ext, $allowed_ext))

 {

$inputFileNamePath = $_FILES['avatar']['tmp_name'];

 $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);

$data = $spreadsheet->getActiveSheet()->toArray();


$count = "0";

foreach($data as $row)

 {

if($count > 0)

 {

$fullname = $row['0'];

$email = $row['1'];

 $phone = $row['2'];

$course = $row['3'];


 $studentQuery = "INSERT INTO student2 (fullname,email,phone,course) VALUES ('$fullname','$email','$phone','$course')";

$result = mysqli_query($con, $studentQuery);

 $msg = true;

}

//  else

// {

//  $count = "1";

//  }

}


// if(isset($msg))

// {

//  $_SESSION['message'] = "Successfully Imported";

// header('Location: index.php');

//  exit(0);

// }

// else

// {

//  $_SESSION['message'] = "Not Imported";

//  header('Location: index.php');

// exit(0);

// }

}

// else

//  {

//  $_SESSION['message'] = "Invalid File";

// header('Location: index.php');

// exit(0);

//  }



?>