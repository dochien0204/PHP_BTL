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
    $pass = password_hash($newPass, PASSWORD_DEFAULT);
    if (strcmp(trim($newPass), "") == 0) {
        $query = mysqli_query($conn, "UPDATE customer SET name = '$name', email = '$email', phone = '$phone', address = '$address' WHERE id = $id");
    } else {
        $query = mysqli_query($conn, "UPDATE customer SET name = '$name', email = '$email', phone = '$phone', address = '$address', password = '$pass' WHERE id = $id");
    }

    //Update session
    include './update-session/user.php';
    
    header('location: profile.php');
  }
?>