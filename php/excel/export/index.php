<?php
require('PHPExcel/excel.php');
$con=mysqli_connect('localhost','root','','myproject');
$res=mysqli_query($con,"select * from user");
if(mysqli_num_rows($res)>0){
	$k=0;
	while($row=mysqli_fetch_assoc($res)){
		$data[$k]['Name']=$row['name'];
		$data[$k]['Email']=$row['email'];
		$k++;
	}
}else{
	echo "Data not found";
}

$excel=new excel();
$file_name=date('d-m-Y').'.xlsx';
$excel->userDefinedstream($file_name,$data);
?>