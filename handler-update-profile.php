<?php 
    include './config/connect.php';
	//Get user session login
    ob_start();
	session_start();
	$user = isset($_SESSION['login']) ? $_SESSION['login'] : [];
    $id = $user['id'];
  //isset POST 
  if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $newPass = $_POST['newPass'];

    $query = mysqli_query($conn, "UPDATE customer SET address = '$address' WHERE id = $id");
    if ($query) {
      header('location: index.php');
    } else {
      header('location: product.php');
    }
  }

?>