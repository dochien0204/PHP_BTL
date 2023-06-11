<?php include 'header.php'; ?>
<?php if (empty($user)): ?>
<?php header('location: login.php');?>
<?php else : ?>
<?php 
        $userId = $user['id'];
        $query = "SELECT SUM(price) as total, id, order_date, status, address, phone  
        FROM orders    
        INNER JOIN order_detail ON orders.id = order_detail.order_id
        WHERE customer_id = $userId
        GROUP BY id";
    
        $result = mysqli_query($conn, $query);
        $style1 = "background-color: #f37a27";
        $style2 = "background-color: #f37a27";
        $style3 = "background-color: #f37a27";
        $textStyle1 = "text-white";
        $textStyle2 = "text-white";
        $textStyle3 = "text-white";
?>
<section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <?php foreach ($result as $key => $value): ?>
            <div class="col-lg-8 col-xl-6 pt-5" style="height: 650px;">
                <div class="card border-top border-bottom border-3"
                    style="border-color: #f37a27 !important; height: 100%;"
                    onclick="orderDetail(<?php echo $value['id'];?>)">
                    <div class="card-body p-5">
                        <p class="lead fw-bold mb-5" style="color: #f37a27;">Hóa đơn thanh toán</p>

                        <div class="row">
                            <div class="col mb-3">
                                <p class="small text-muted mb-1">Ngày đặt hàng</p>
                                <p><?php echo date("m/d/y",$value['date']);?></p>
                            </div>
                            <div class="col mb-3">
                                <p class="small text-muted mb-1">Địa chỉ giao hàng</p>
                                <p><?php echo $value['address'];?></p>
                            </div>
                        </div>

                        <div class="mx-n5 px-5 py-4" style="background-color: #f2f2f2;">
                            <?php 
                            $orderId = $value['id'];
                            $products = mysqli_query($conn, "SELECT product.name as 'name', order_detail.price as 'price', order_detail.quantity as 'quantity'
                            FROM order_detail 
                            INNER JOIN product ON order_detail.product_id = product.id
                            WHERE order_detail.order_id = $orderId");
                            foreach ($products as $key => $product):
                            ?>
                            <div class="row">
                                <div class="col-md-8 col-lg-9">
                                    <p><?php echo $product['name'];?></p>
                                </div>
                                <div class="col-md-4 col-lg-3">
                                    <p>x<?php echo $product['quantity'] ?></p>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>

                        <div class="row text-lg-left mt-2">
                            <div class="col-md-4 offset-md-8 col-lg-5 offset-lg-9">
                                <p class="lead fw-bold mb-0" style="color: #f37a27;">
                                    <?php echo number_format($value['total'])?>đ
                                </p>
                            </div>
                        </div>

                        <p class="lead fw-bold mb-4 pb-2" style="color: #f37a27;">Tracking Order</p>

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="horizontal-timeline">
                                    <?php 
                                    if ($value['status'] == 1) {
                                        $style1 = "";
                                        $textStyle1 = "";
                                        $style2 = "background-color: #f37a27";
                                        $style3 = "background-color: #f37a27";
                                        $textStyle2 = "text-white";
                                        $textStyle3 = "text-white";
                                    } else if ($value['status'] == 2) {
                                        $style2 = "";
                                        $textStyle2 = "";
                                        $style1 = "background-color: #f37a27";
                                        $style3 = "background-color: #f37a27";
                                        $textStyle1 = "text-white";
                                        $textStyle3 = "text-white";
                                    } else {
                                        $style3 = "";
                                        $textStyle3 = "";
                                        $style1 = "background-color: #f37a27";
                                        $style2 = "background-color: #f37a27";
                                        $textStyle1 = "text-white";
                                        $textStyle2 = "text-white";
                                    }
                                    ?>
                                    <ul class="list-inline items d-flex justify-content-between">
                                        <li class="list-inline-item items-list">
                                            <p class="py-1 px-2 rounded <?php echo $textStyle1 ?>"
                                                style="<?php echo $style1;?>">
                                                Ordered
                                            </p>
                                        </li>
                                        </li>
                                        <li class="list-inline-item items-list">
                                            <p class="py-1 px-2 rounded <?php echo $textStyle2 ?>"
                                                style="<?php echo $style2;?>">
                                                On the way
                                            </p>
                                        </li>
                                        <li class="list-inline-item items-list">
                                            <p class="py-1 px-2 rounded <?php echo $textStyle3 ?>"
                                                style="<?php echo $style3;?>">
                                                Delivered
                                            </p>
                                        </li>
                                    </ul>

                                </div>

                            </div>
                        </div>

                        <p class="mt-4 pt-2 mb-0">Want any help? <a href="#!" style="color: #f37a27;">Please contact
                                us</a></p>
                    </div>
                </div>
            </div>
            <?php endforeach?>
        </div>
    </div>
</section>
<script>
function orderDetail(id) {
    window.location.href = "http://localhost:3000/PHP_BTL/order-detail.php?id=" + id;
}
</script>
<?php endif ?>
<?php include 'footer.php'?>