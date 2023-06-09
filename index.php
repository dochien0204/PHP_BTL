<?php 
	include 'header.php';

	// truy vấn láy ra những sản phẩm khuyến mãi 

	$sql_pro_sale = "SELECT * FROM product WHERE sale_price > 0";
	$pro_sale = mysqli_query($conn,$sql_pro_sale);

	// truy vấn lấy ra sản phẩm mới nhất 

	$sql_pro_new = "SELECT * FROM product WHERE status = 1 ORDER BY id DESC";
	$pro_new = mysqli_query($conn,$sql_pro_new);

	
	
	if(isset($_GET['mess'])){
		echo "<script>alert('Đặt hàng thành công')</script>";

	}
	if(isset($_GET['error'])){
		echo "<script>alert('Đặt hàng thất bại do không có sản phẩm nào trong giỏ hàng');
		</script>";
	}
 ?>

<!-- <div class="jumbotron">
			<h1 class="display-3">Home </h1>
			<p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
			<hr class="m-y-md">
			<p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
			<p class="lead">
				<a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
			</p>
		</div> -->

<div class="container">
    <section>
        <div id="carouselExampleIndicators" class="carousel slide h-30 mt-3" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner center-block">
                <div class="carousel-item active">
                    <img class="img-fluid w-100 h-100 object-fit-cover" src="./uploads/banner-1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="img-fluid w-100 h-100" src="./uploads/banner2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="img-fluid w-100" src="./uploads/banner3.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <h1 class="mt-5">Danh sách sản phẩm<span class="label label-default text-danger"> Khuyến mại</span></h1>
        <div class="row">
            <?php foreach ($pro_sale as $key => $value): ?>
            <div class="col-lg-3 mt-3" style="padding:10px; height:488.7px;">
                <div class="card text-center" style="height: 100%">
                    <img class="card-img-top object-fit-cover" style="height: 60%"
                        src="uploads/<?php echo $value['image'] ?>" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $value['name'] ?></h4>
                        <p class="card-text">
                            <del><?php echo number_format($value['price']) ?>đ</del>

                            <strong class="text-danger"><?php echo number_format($value['sale_price']) ?>đ</strong>

                        </p>
                        <a href="product-detail.php?id=<?php echo $value['id']?>" class="btn btn-primary">Xem chi
                            tiết</a>
                    </div>
                </div>
            </div>
            <?php endforeach ?>


        </div>
    </section>

    <section>
        <h1 class="mt-5">Danh sách sản phẩm<span class="label label-default text-danger"> Mới</span></h1>

        <div class="row">

            <?php foreach ($pro_new as $key => $value): ?>
            <div class="col-lg-3 mt-3" style="height: 488.7px;">
                <div class="card text-center" style="height: 100%">
                    <img class="card-img-top bg-image hover-zoom" style="height: 60%;"
                        src="uploads/<?php echo $value['image'] ?>" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $value['name'] ?></h4>
                        <p class="card-text">
                            <?php if ($value['sale_price'] > 0): ?>
                            <del><?php echo number_format($value['price']) ?>đ</del>
                            <strong class="text-danger"><?php echo number_format($value['sale_price']) ?>đ</strong>
                            <?php else: ?>
                            <strong class="text-danger"><?php echo number_format($value['price']) ?>đ</strong>

                            <?php endif ?>

                        </p>
                        <a href="product-detail.php?id=<?php echo $value['id'] ?>" class="btn btn-primary">Xem chi
                            tiết</a>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </section>
</div>
<?php include 'footer.php' ?>