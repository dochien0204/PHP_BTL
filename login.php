<?php 
    include 'header.php';

    $title = "First Login";
    if(isset($_POST['email'])){
        
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        // buoc1 so khop du lieu tu form vs db 
        $check = mysqli_query($conn,"SELECT * FROM customer WHERE email = '$email'");

        $errors;
        if(mysqli_num_rows( $check) == 1){
            $data = mysqli_fetch_assoc($check);
            $pass = $data['password'];

            $checPass = password_verify($password, $pass);

            if($checPass){
              // lưu vao session 
              $_SESSION['login'] = $data;

              if(isset($_GET['url'])){
                header('location: '.$_GET['url']);
              } else {
                 header('location: index.php');
              }
             
            } else{
              $title = "Mật khẩu không chính xác";
              include 'header-modal.php';
            }

        } else{
          $title = "Tài khoản không tồn tại";
          include 'header-modal.php';
        }      
    }
 ?>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">

  <!-- The Modal -->
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

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đăng nhập</p>

                <form class="mx-1 mx-md-4" method="POST">

                 

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw pr-4"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form3Example3c" class="form-control" name="email" placeholder="Email" required/>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw pr-4"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" class="form-control" name="password" placeholder="Nhập mật khẩu" required/>
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg" id="login">Đăng nhập</button>
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
<?php 
  include 'footer.php'
?>