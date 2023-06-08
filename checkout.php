<?php 

	include 'header.php';

	if(isset($_POST['phone'])){
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$customer_id = $user['id'];
		$query = mysqli_query($conn,"INSERT INTO orders (customer_id,address,phone) VALUES ('$customer_id','$address','$phone')");

		if($query){
			$order_id = mysqli_insert_id($conn);
			foreach ($cart as $key => $value) {
				$product_id = $value['id'];
				$price = $value['price'];
				$quantity = $value['quantity'];
				mysqli_query($conn,"INSERT INTO order_detail (order_id,product_id,price,quantity) VALUES ('$order_id',' $product_id','$price','$quantity')");
			}
			unset($_SESSION['cart']);
			header('location: index.php?mess=true');
		} else {
			echo "<script>alert('Đặt hàng thất bại do không có sản phẩm nào trong giỏ hàng')</script>";
		}


	}
	
 ?>

		<div class="container mt-5">

			<?php if (empty($user)): ?>
				<a href="login.php?url=checkout.php" class="btn btn-primary">Vui lòng đăng nhập Để mua hàng</a>
			<?php else : ?>
				<div class="row">
				
				<div class="col-lg-9">
					<form action="" method="POST">
						  <div class="form-group">
						    <label for="exampleInputEmail1">Họ và tên</label>
						    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $user['name']?>">
						    
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Email</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $user['email']?>">
						    
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Phone</label>
						    <input type="text" class="form-control" id="exampleInputPassword1" name="phone" value="<?php echo $user['phone']?>"> 
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Địa chỉ</label>
						    <input type="text" class="form-control" id="exampleInputPassword1" name="address" >
						  </div>
						  <button type="submit" class="btn btn-primary">Đặt</button>
						</form>
				</div>
				<div class="col-lg-3">
					<table class="table">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Name</th>
						      <th scope="col">iamge</th>
						      <th scope="col">quantity</th>
						      <th scope="col">price</th>
						      
						      <th></th>
						    </tr>
						  </thead>
						  <tbody>
						    <?php foreach ($cart as $key => $value): ?>
						    	 <tr>
								      <th scope="row">3</th>
								      <td><?php echo $value['name'] ?></td>
								      <td><img src="uploads/<?php echo $value['image'] ?>" alt="" width="50px"></td>
								      <td>
								      	<?php echo $value['quantity'] ?>
								      	
								       </td>
								      <td><?php echo $value['price'] ?></td>     
							    </tr>
						    <?php endforeach ?>
						   
						  </tbody>
						</table>

						
				</div>
			</div>
			<?php endif ?>
			
		</div>
<?php include 'footer.php' ?>