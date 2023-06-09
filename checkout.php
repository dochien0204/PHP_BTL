<?php 

	include 'header.php';
	
 ?>

<div class="container mt-5">

    <?php if (empty($user)): ?>
    <a href="login.php?url=checkout.php" class="btn btn-primary">Vui lòng đăng nhập Để mua hàng</a>
    <?php else : ?>
    <div class="row">

        <div class="col-lg-9">
            <form action="./handler-order.php" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Họ và tên</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        value="<?php echo $user['name']?>">

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        value="<?php echo $user['email']?>">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Phone</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="phone"
                        value="<?php echo $user['phone']?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Địa chỉ</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="address">
                </div>
                <button type="submit" class="btn btn-primary">Đặt</button>
            </form>
        </div>
        <div class="col-lg-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá</th>

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