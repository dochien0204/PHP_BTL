<?php 
  include 'header.php';
  // lấy tất cả danh mục để duyệt ra select-option
  $category = mysqli_query($conn,"SELECT * FROM category");
  
  if(isset($_POST['name'])){
  		$name = $_POST['name'];
  		$price = $_POST['price'];
  		$sale_price = $_POST['sale_price'];
  		$category_id = $_POST['category_id'];
  		$status = $_POST['status'];

  		// sử lý up ảnh 
  		if(isset($_FILES['image'])){
  			$file_name = $_FILES['image']['name'];
  			move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/'.$file_name);
  		}
  		// them moi 

  		$sql = "INSERT INTO product (name,status,price,sale_price,image,category_id) VALUES ('$name','$status','$price','$sale_price','$file_name','$category_id')";

  		$query = mysqli_query($conn,$sql);
  		if($query){
  			header('location: product.php');
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
       Quản lý sản phẩm
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
          <h3 class="box-title">Thêm mới sản phẩm</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form action="" method="POST"  enctype="multipart/form-data">
           
          
            <div class="form-group">
              <label for="">Tên sản phẩm </label>
              <input type="text" class="form-control" id="" name="name">
            </div>
          	
          	 <div class="form-group">
              <label for="">Tên giá sản phẩm</label>
              <input type="text" class="form-control" id="" name="price">
            </div>
            <div class="form-group">
              <label for="">Giá KM</label>
              <input type="text" class="form-control" id="" name="sale_price">
            </div>
            <div class="form-group">
              <label for="">Danh mục sản phẩm</label>
              <select name="category_id" id="input" class="form-control" required="required">
              	<?php foreach ($category as $key => $value): ?>
              		<option value="<?php echo $value['id']?>"><?php echo $value['name'] ?></option>
              	<?php endforeach ?>
              	
              </select>
            </div>
             <div class="form-group">
              <label for="">ảnh sản phẩm</label>
              <input type="file" class="form-control" id="" name="image">
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