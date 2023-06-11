<?php
 include './config/connect.php';
$title = "";
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $check = mysqli_query($conn, "SELECT * FROM customer WHERE email = '$email'");
        if (mysqli_num_rows($check) == 1) {
          $title = "Email đã tồn tại, vui lòng nhập email khác";
          include 'header-modal.php';
        } else {
          $phone = $_POST['phone'];
          $password = $_POST['password'];
          $confirmPassword = $_POST['confirm_password'];
          if (strcmp($password, $confirmPassword) != 0) {
            $title = "Mật khẩu xác nhận không khớp";
            include 'header-modal.php';
          } else {
            $pass = password_hash($password, PASSWORD_DEFAULT);
            
            $query = mysqli_query($conn,"INSERT INTO customer (name,email,password,confirm_password,phone) VALUES ('$name','$email','$pass','$password','$phone')");
            if (!$query) {
              $title = "Email đã tồn tại, vui lòng nhập email khác";
              include 'header-modal.php';
            } else {
              header('location: login.php');
            }
          }
        }
    }
?>