<?php 
    include 'header.php';
    $userId = $user['id'];
    if (isset($_GET['id'])) {
    //Select order detail of user;
    $orderId = $_GET['id'];
    $query = "SELECT order_detail.order_id as 'order_id', address, product.image as 'image', product.name as 'name', product.sale_price as 'price', order_detail.price as 'total-price', order_detail.quantity as 'quantity', orders.status as 'status'
    FROM order_detail 
    INNER JOIN product ON product.id = order_detail.product_id
    INNER JOIN orders ON orders.id = order_detail.order_id
    WHERE customer_id = $userId
    AND order_id = $orderId";
    $result = mysqli_query($conn, $query);
    $totalPrice = 0.0;
    }
    // if (isset($_GET['id'])) {
    //     $orderId = $_GET['id'];
    //     $userId = $user['id'];
    //     $query = "SELECT SUM(price) as total, order_date, status, address, phone  
    //     FROM orders    
    //     INNER JOIN order_detail ON orders.id = order_detail.order_id
    //     WHERE customer_id = $userId AND order_detail.order_id = $orderId";
    
    //     $result = mysqli_query($conn, $query);
    // }
?>

<section class="h-100 bg-white">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-10 col-xl-8">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header px-4 py-5">
                        <h5 class="text-muted mb-0">Thanks for your Order, <span
                                style="color: #a8729a;"><?php echo $user['name'];?></span>!
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <p class="lead fw-normal mb-0" style="color: #a8729a;">Trạng thái đơn hàng</p>
                        </div>
                        <?php foreach($result as $key => $value): ?>
                        <div class="card shadow-0 border mb-4" id="order">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <p class="mb-0 font-weight-bold">Hình ảnh</p>
                                    </div>
                                    <div class="col-md-4 text-center d-flex justify-content-center align-items-center">
                                        <p class="text-muted mb-0 font-weight-bold">Tên sản phẩm</p>
                                    </div>
                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                        <p class="text-muted mb-0 font-weight-bold">Giá</p>
                                    </div>
                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                        <p class="text-muted mb-0 font-weight-bold">Số lượng</p>
                                    </div>
                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                        <p class="text-muted mb-0 font-weight-bold">Tổng</p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-2">
                                        <img src="uploads/<?php echo $value['image'];?>" class="img-fluid" alt="Phone">
                                    </div>
                                    <div class="col-md-4 text-center d-flex justify-content-center align-items-center">
                                        <p class="text-muted mb-0"><?php echo $value['name']; ?></p>
                                    </div>
                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                        <p class="text-muted mb-0"><?php echo number_format($value['price']);?>
                                            đ
                                        </p>
                                    </div>
                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                        <p class="text-muted mb-0"><?php echo $value['quantity']; ?></p>
                                    </div>
                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                        <p class="text-muted mb-0">
                                            <?php echo number_format($value['total-price']); $totalPrice += $value['total-price'];?>đ
                                        </p>
                                    </div>
                                </div>
                                <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-2">
                                        <p class="text-muted mb-0 small">Track Order</p>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="progress" style="height: 6px; border-radius: 16px;">
                                            <div class="progress-bar" role="progressbar" style="width: <?php if ($value['status'] == 1) {
                                                    echo "33%";
                                                } else if ($value['status'] == 2) {
                                                    echo "66%";
                                                } else {
                                                    echo "100%";
                                                }
                                                ?>; border-radius: 16px; background-color: #a8729a;" aria-valuenow="65"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-around mb-1">
                                            <p class="text-muted mt-1 mb-0 small ms-xl-5">Ordered</p>
                                            <p class="text-muted mt-1 mb-0 small ms-xl-5">On the way</p>
                                            <p class="text-muted mt-1 mb-0 small ms-xl-5">Delivered</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                        <div class="d-flex justify-content-between pt-2">
                            <p class="fw-bold mb-0">Order Details</p>
                        </div>

                        <div class="d-flex justify-content-between pt-2">
                            <p class="text-muted mb-0"><span class="font-weight-bold">Khách hàng
                                </span><?php echo $user['name'];?></p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <p class="text-muted mb-0"><span class="font-weight-bold">Số điện thoại:
                                </span><?php echo $user['phone']?></p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="text-muted mb-0"><span class="font-weight-bold">Địa chỉ giao hàng:
                                </span> <?php echo $value['address'];?></p>
                        </div>

                        <div class="d-flex justify-content-between mb-5">
                            <p class="text-muted mb-0"><span class="font-weight-bold">Ngày order:
                                </span><?php echo date("m/d/y",$value['date']);?></p>
                            <div class="card-footer border-0 px-4 py-5"
                                style="background-color: white; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                                <h5
                                    class="d-flex align-items-center justify-content-end text-uppercase mb-0 text-black">
                                    Total
                                    paid: <span class="ml-2 h2 mb-0 ms-2">
                                        <?php echo number_format($totalPrice); ?>đ</span>
                                </h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php'?>