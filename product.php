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

<div class="container-xxl mt-5 mx-5">
    <div class="row">
        <div class="col-lg-3 mt-3">
            <ul class="list-group nav nav-tabs">
                <li class="list-group-item bg-primary">Danh mục sản phẩm</li>
                <?php foreach ($category as $key => $value): ?>
                <li class="list-group-item nav-item">
                    <a class="nav-link" href="product.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?>
                    </a>
                </li>
                <?php endforeach ?>

            </ul>
        </div>

        <div class="col-lg-9">
            <div class="row">

                <?php foreach ($product as $key => $value): ?>
                <div class="col-lg-3 mt-3" style="height: 591px;">
                    <div class="card text-center overflow-hidden" style="height: 100%;">
                        <img class="card-img-top" src="uploads/<?php echo $value['image'] ?>" style="height: 60%;"
                            alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $value['name'] ?></h4>
                            <p class="card-text h-10">Sản phẩm nằm trong top 10 sản phẩm đẹp nhất của cừa hàng</p>
                            <a href="product-detail.php?id=<?php echo $value['id'] ?>" class="btn btn-primary h-10">Go
                                somewhere</a>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>


            </div>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>