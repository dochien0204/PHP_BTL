<?php include 'connectdb.php'; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php 
		$conn = mysqli_connect('localhost', 'root', 'root', 'phpmyadmin');

		$query = mysqli_query($conn, "SELECT * FROM qlnv");
		if (!$query) {
			echo 'Retrived failed';
		}
	
		if (mysqli_num_rows($query) > 0) {
			echo 'Co key qua';
			while ($row=mysqli_fetch_row($query)) {
				echo $row[0];
				echo $row[1];
				echo "<img src=".$row[2].">";
				echo $row[3];
				echo $row[4];
				echo $row[5];
			}
		}
	$sos = "SOS"
	?>
	<table border="1">
		<tr>
			<td><?php echo $sos?></td>
			<td>Mã Nhân Viên</td>
			<td>Họ và tên</td>
			<td>Hình Ảnh</td>
			<td>Xếp loại</td>
			<td>Lương ngày</td>
			<td>Ngày công</td>
		</tr>
		<?php 
			foreach ($query as $key => $value): 
			echo "1";
		?>
		<tr>
			<td><?php echo $value['MaNV']; ?></td>
			<td><?php echo $value['HoTen']; ?></td>
			<td><?php echo $value['HinhAnh']; ?></td>
			<td><?php echo $value['XepLoai']; ?></td>
			<td><?php echo $value['LuongNgay']; ?></td>
			<td><?php echo $value['NgayCong']; ?></td>
		</tr>
		<?php endforeach?>
	</table>
</body>
</html>
