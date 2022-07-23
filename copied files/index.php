<?php
	session_start();
	if(!$_SESSION['myproject']){
		header('location:login.php');
	}
	// if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
	// 	$uri = 'https://';
	// } else {
	// 	$uri = 'http://';
	// }
	// $uri .= $_SERVER['HTTP_HOST'];
	// header('Location: '.$uri.'/dashboard/');
	// exit;
?>
<!-- Something is wrong with the XAMPP installation :-( -->
<h1>Welcome you are authenticated.....!</h1>