<?php 
    include '../config/connect.php';
    //Start Session
    include './start-session.php';
    
    //Get user from db 
    $check = mysqli_query($conn, "SELECT * FROM customer WHERE id = $id");
    
    //fetch data
    $data = mysqli_fetch_assoc($check);

    //Save to session
    $_SESSION['login'] = $data;
?>