<?php 
		ob_start();

	include 'connectdb.php';
	if (isset($_POST['maNv'])) {
		$maNv = $_POST['maNv'];
		$tenNv = $_POST['tenNv'];
		$luong = $_POST['luong'];
		$ngayCong = $_POST['ngayCong'];
		//Xu li anh
		$targetDir = "uploads/";
		$targetFile = $targetDir.basename($_FILES['image']['name']);
		if (isset($_FILES['image'])) {
			$fileName = $_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'], './'.$fileName);
		}
		
		//Them moi
		$sql = "INSERT INTO qlnv values ('$maNv', '$tenNv', '$fileName', 'A', '$luong', '$ngayCong')";
		$result = mysqli_query($conn, $sql) or die("Loi truy van");
		header('location:hienthi.php');
ob_end_flush(); 
	}
?>