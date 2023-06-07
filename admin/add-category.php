<?php 
  include 'header.php';

  if(isset($_POST['name'])){
      $name = $_POST['name'];
      $status = $_POST['status'];

      $sql = "INSERT INTO category(name,status) VALUES ('$name','$status')";
      $query = mysqli_query($conn,$sql);

      if($query){
        header('location: category.php');
      }
  }

 ?>

  <?php include 'siderbar.php' ?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Quản lý danh mục
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Thêm mới danh mục</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form action="" method="POST" role="form">
           
          
            <div class="form-group">
              <label for="">Tên danh mục </label>
              <input type="text" class="form-control" id="" name="name">
            </div>
          
            <div class="form-group">
              <div class="radio">
                <label>Trạng thái</label>
              </div>
                  <div class="radio">
                  <label>
                  <input type="radio" name="status" id="status2" value="1" checked>
                  Hiện
                  </label>
                  </div>
                  <div class="radio">
                  <label>
                  <input type="radio" name="status" id="status3" value="0" >
                  Ẩn
                </label>
             </div>
            </div>
          
            <button type="submit" class="btn btn-primary">Thêm mới</button>
          </form>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php include 'footer.php' ?>