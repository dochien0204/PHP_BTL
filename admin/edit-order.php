<?php 
  include 'header.php';
  // lấy về thông tin sản phẩm dựa vào id trên URL 
  if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = mysqli_query($conn,"SELECT * FROM orders WHERE id = $id");
    $order = mysqli_fetch_assoc($query);
  }
  
  if(isset($_POST['status'])){
  		$status = $_POST['status'];
  		$sql = "UPDATE orders SET status = $status WHERE id = $id";
  		$query = mysqli_query($conn,$sql);
  		if($query){
  			header('location: order-m.php');
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
            Quản lý Đơn hàng
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
                <h3 class="box-title">Sửa đơn hàng</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Trạng thái đơn hàng</label>
                        <input type="text" class="form-control" id="" name="status"
                            value="<?php echo $order['status']?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
            <!-- /.box-body -->
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include 'footer.php' ?>