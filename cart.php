<?php 
	
	include 'config/connect.php';
	session_start();

	$id = isset($_GET['id']) ? $_GET['id'] : 0;
	$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;
	$action = isset($_GET['action']) ? $_GET['action'] : '';


	// truy vấn sản phẩm dựa vào id sp 
	$query = mysqli_query($conn,"SELECT * FROM product WHERE id = $id");


	switch ($action) {
		case 'add':
			if(mysqli_num_rows($query) == 1){

				$data = mysqli_fetch_assoc($query);

				$item = [
					'id'=>$data['id'],
					'name'=>$data['name'],
					'quantity'=>$quantity,
					'price'=>$data['sale_price'] > 0 ? $data['sale_price'] : $data['price'],
					'image'=>$data['image']
				];

				// kiểm tra xem có sản phẩm tròng giỏ hàng hay chưa
				if(isset($_SESSION['cart'][$id])){
					$_SESSION['cart'][$id]['quantity'] += $quantity;
				} else {
						// lưu session
					$_SESSION['cart'][$id] = $item;
				}
			
				
				header('location: show-cart.php');
				}
			break;
		case 'update':
				if($quantity <= 0){
					unset($_SESSION['cart'][$id]);
				} else {
					$_SESSION['cart'][$id]['quantity'] = $quantity;
				}
				header('location: show-cart.php');
				break;
		default:
			unset($_SESSION['cart'][$id]);
			header('location: show-cart.php');
			break;
	}
	


 ?>