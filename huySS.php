<?php 
	session_start();

	// hủy tất cả sesssion tồn tại trên ứng dụng
	session_destroy();

	// hủy session theo tên
	session_decode('data');

 ?>