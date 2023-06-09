<?php 

	include 'header.php';
    mysqli_autocommit($conn,FALSE);

	if(isset($_POST['phone'])){
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$customer_id = $user['id'];
		$query = mysqli_query($conn,"INSERT INTO orders (customer_id,address,phone) VALUES ($customer_id,'$address','$phone')");
        if($query && !empty($cart)){
			$order_id = mysqli_insert_id($conn);
			mysqli_commit($conn);
			print("Oder ID la".$order_id);
			foreach ($cart as $key => $value) {
				$product_id = $value['id'];
				$price = $value['price'];
				$quantity = $value['quantity'];
				mysqli_query($conn,"INSERT INTO order_detail (order_id,product_id,price,quantity) VALUES ($order_id, $product_id, $price * $quantity, $quantity)");
			}
			mysqli_commit($conn);
			unset($_SESSION['cart']);
			header('location: index.php?mess=true');
		} else {
            mysqli_rollback($conn);
            header('location: index.php?error=true');
		}

	}
	
 ?>