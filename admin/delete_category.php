<?php include 'header.php';
    if (isset($_GET['id'])) {
        $id= $_GET['id'];
        $query = mysqli_query($conn , "DELETE FROM category WHERE id = '$id' ");
        var_dump($query);
        if($query){
            header("location:category.php");
        }
    }
?>