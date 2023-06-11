<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
	<form action="add_handler.php" method="post" enctype="multipart/form-data"> 
		<table>
			<tr>
				<td>Ma NV</td>
				<td><input type="text" name="maNv"/></td>
			</tr>
			<tr>
				<td>Ten NV</td>
				<td><input type="text" name="tenNv"/></td>
			</tr>
			<tr>
				<td>Luong Thang</td>
				<td><input type="text" name="luong"/></td>
			</tr>
			<tr>
				<td>Ngay Cong</td>
				<td><input type="text" name="ngayCong"/></td>
			</tr>
			<tr>
				<td>Hinh anh</td>
				<td><input type="file" name="image"/></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="submit" value="Submit" />
				</td>
			</tr>
		</table>
	</form>
</body>
</html>