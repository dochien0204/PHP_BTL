<?php 
	include 'header.php';

	$id = isset($_GET['id']) ?  $_GET['id'] : 0;

	$query = mysqli_query($conn,"SELECT product.*, category.name as 'cate_name' FROM product JOIN category ON product.category_id = category.id WHERE product.id = $id");


	$pro = mysqli_fetch_assoc($query);
    if(empty($pro)){
        header('location: 404.php');
    }

	// sản phẩm liên quan
	$pro_cate = empty($pro) ? 0 : $pro['category_id'];

	$pro_rl = mysqli_query($conn,"SELECT * FROM product WHERE category_id = $pro_cate AND id != $id");

 ?>
<div class="container">
    <div class="col-lg-8 border p-3 main-section position-relative bg-white">
        <div class="row hedding m-0 pl-3 pt-0 pb-3">
            Thông tin chi tiết sản phẩm
        </div>
        <form action="cart.php" method="GET">
        <div class="row m-0">
            <div class="col-lg-4 left-side-product-box pb-3">
                <img src="uploads/<?php echo $pro['image'] ?>" class="border p-3">
                
            </div>
            
            <div class="col-lg-8">
                <div class="right-side-pro-detail border p-3 m-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <span><?php  echo $pro['name']?></span>
                          
                        </div>
                        <div class="col-lg-12">
                            <p class="m-0 p-0 price-pro"><?php echo number_format($pro['price']) ?>đ</p>
                            <hr class="p-0 m-0">
                        </div>
                        <div class="col-lg-12 pt-2">
                            <h5>Chi tiết sản phẩm</h5>
                            <span>Sản phẩm nằm trong top 10 sản phẩm đẹp nhất của cừa hàng</span>
                            <hr class="m-0 pt-2 mt-2">
                        </div>
                        <div class="col-lg-12">
                            <p class="tag-section"><strong>Sản phẩm dành cho : </strong><a href=""><?php  echo $pro['cate_name']?></a></p>
                        </div>
                        
                            <div class="col-lg-12">
                                <h6>Số lượng :</h6>
                                <input type="number" class="form-control text-center w-100" value="1" name="quantity">
                                <input type="hidden" name="id" value="<?php echo $pro['id'] ?>">
                                <input type="hidden" name="action" value="add">
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div class="row">
                                    <div class="col-lg-6 pb-2">
                                        <button type="submit"  class="btn btn-danger w-100">Thêm vào giỏ hàng</button>
                                    </div>
                                    <div class="col-lg-6">
                                        <a href="index.php" class="btn btn-success w-100">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
          
        </div>
          </form>
        <div class="row">
            <div class="col-lg-12 text-center pt-3">
                <h4>Sản phẩm liên quan</h4>
            </div>
        </div>
        <div class="row mt-3 p-0 text-center pro-box-section">

        	<?php foreach ($pro_rl as $key => $value): ?>
        		 <div class="col-lg-3 pb-2">
	                <div class="pro-box border p-0 m-0">
	                    <img src="uploads/<?php echo $value['image'] ?>">
	                </div>
	            </div>
        	<?php endforeach ?>
           
            
        </div>
    </div>
</div>
<?php include 'footer.php' ?>