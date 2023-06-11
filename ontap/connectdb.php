<?php 

	$conn = mysqli_connect('localhost', 'root', 'root', 'phpmyadmin');
	mysqli_set_charset($conn,"UTF8");

	if (!$conn) {
		echo 'Connected failed';
	} else {
		echo 'Connect succ';
	}
?>