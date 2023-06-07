<?php include 'header.php';
    if (isset($_GET['id'])) {
        var_dump($_GET['id']);
        $id= $_GET['id'];
        $query = mysqli_query($conn , "DELETE FROM product WHERE id = '$id' ");
        var_dump($query);
        if($query){
            header("location:product.php");
        }
    }
?>