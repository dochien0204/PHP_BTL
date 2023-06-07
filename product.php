<?php 

	include 'header.php';

	$category = mysqli_query($conn,"SELECT * FROM category WHERE  status != 0");

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$product = mysqli_query($conn,"SELECT * FROM product Where status !=0 AND category_id = $id");
		
	} else if(isset($_GET['keyword'])){
		$keyword = $_GET['keyword'];
		$product = mysqli_query($conn,"SELECT * FROM product Where name LIKE '%$keyword%' AND status !=0");

	
	}
	else {
		$product = mysqli_query($conn,"SELECT * FROM product Where status !=0");
	}
	

 ?>

		<div class="container mt-5">
			<div class="row">
				<div class="col-lg-3">
					<ul class="list-group">
					  <li class="list-group-item bg-primary">Danh mục sản phẩm</li>
					  <?php foreach ($category as $key => $value): ?>
					  	 <li class="list-group-item"><a href="product.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></li>
					  <?php endforeach ?>
					 
					</ul>
				</div>

				<div class="col-lg-9">
					<div class="row">

						<?php foreach ($product as $key => $value): ?>
							<div class="col-lg-3">
								<div class="card text-center">
									<img class="card-img-top" src="uploads/<?php echo $value['image'] ?>" alt="Card image cap">
									<div class="card-body">
										<h4 class="card-title"><?php echo $value['name'] ?></h4>
										<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
										<a href="#" class="btn btn-primary">Go somewhere</a>
									</div>
								</div>
							</div>
						<?php endforeach ?>
						
				
					</div>
				</div>
			</div>
		</div>
<?php include 'footer.php' ?>