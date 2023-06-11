<?php 
    include 'header.php';
    $title = "";
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $check = mysqli_query($conn, "SELECT * FROM customer WHERE email = '$email'");
        if (mysqli_num_rows($check) == 1) {
          $title = "Email đã tồn tại, vui lòng nhập email khác";
          include 'header-modal.php';
        } else {
          $phone = $_POST['phone'];
          $password = $_POST['password'];
          $confirmPassword = $_POST['confirm_password'];
          if (strcmp($password, $confirmPassword) != 0) {
            $title = "Mật khẩu xác nhận không khớp";
            include 'header-modal.php';
          } else {
            $pass = password_hash($password, PASSWORD_DEFAULT);
            
            $query = mysqli_query($conn,"INSERT INTO customer (name,email,password,confirm_password,phone) VALUES ('$name','$email','$pass','$password','$phone')");
            header('location: login.php?register=true');
          }
        }
    }
    
 ?>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <!-- Modal -->
        <div class="modal fade show" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo "Login failed" ?></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php echo $title ?>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đăng ký</p>

                                <form autocomplete="on" class="mx-1 mx-md-4" method="POST">

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input required type="text" id="form3Example1c" class="form-control"
                                                name="name" placeholder="Họ tên" />
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input required type="email" id="form3Example3c" class="form-control"
                                                name="email" placeholder="Email" />
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input required type="text" id="form3Example3c" class="form-control"
                                                name="phone" placeholder="Số điện thoại" />
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input required type="password" id="form3Example4c" minlength="6"
                                                class="form-control" name="password" placeholder="Nhập mật khẩu" />
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 fa-fw pr-4"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input required type="password" id="form3Example4cd" class="form-control"
                                                name="confirm_password" placeholder="Xác nhận mật khẩu" />
                                        </div>
                                    </div>



                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary btn-lg">Đăng ký</button>
                                    </div>

                                </form>

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                    class="img-fluid" alt="Sample image">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php' ?>