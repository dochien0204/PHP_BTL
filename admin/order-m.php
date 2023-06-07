<?php include 'header.php';
    
    $sql = "SELECT orders.*,customer.name FROM orders JOIN customer ON orders.customer_id = customer.id";
    $orders = mysqli_query($conn,$sql);
    $total = mysqli_num_rows($orders);
    $limit = 4;  
    $page = ceil($total/$limit);
    $curent_page = isset($_GET['page']) ?  $_GET['page'] : 1;
    $start = $limit * ($curent_page - 1);
    $orders = mysqli_query($conn,"SELECT orders.*,customer.name FROM orders JOIN customer ON orders.customer_id = customer.id  ORDER BY `orders`.`id` DESC LIMIT $start,$limit");
 ?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <?php include 'siderbar.php' ?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Quản lý ddơn hàng
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
          <h3 class="box-title">Danh sách đơn hàng</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <a href="add-category.php" class="btn btn-success">Thêm mới danh mục</a>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ </th>
                <th>Số điện thoại</th>
                <th>Trạng thái</th>
                <th>Ngày đặt</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($orders as $key => $value): ?>
                 <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><?php echo $value['name'] ?></td>
                    <td><?php echo $value['address'] ?></td>
                    <td><?php echo $value['phone'] ?></td>
                  
                      <?php if ($value['status'] == 1): ?>
                          <td><span class="bg-red label">Chờ xử lý</span></td>
                      <?php elseif($value['status'] == 2): ?>
                           <td><span class="bg-green label">Đang xử lý</span></td>
                      <?php else: ?>
                           <td><span class="bg-success label">Hoàn thành</span></td>
                      <?php endif ?>
                    
                     <td><?php echo $value['order_date'] ?></td>
                    <td>
                      <a href="order-detail.php?id=<?php echo $value['id'] ?>" title="chi tiết đơn" class="btn btn-primary">
                        <span class="fa fa-eye"></span>
                      </a>
                   
                    </td>
                </tr>
              <?php endforeach ?>
             
            </tbody>
          </table>
          <ul class="pagination">
            <li><a href="order-m.php?page=<?php echo $curent_page - 1 ?>">&laquo;</a></li>
            <?php for ($i=1;$i<=$page;$i++): ?>
               <li class="<?php echo ($curent_page==$i) ? 'active': ''?>"><a href="order-m.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
            <?php endfor ?>
            <li><a href="order-m.php?page=<?php echo $curent_page + 1 ?>">&raquo;</a></li>
          </ul>
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