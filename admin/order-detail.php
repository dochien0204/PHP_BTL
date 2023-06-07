<?php include 'header.php';


$id = isset($_GET['id']) ? $_GET['id'] : 0; 

$customer_query = mysqli_query($conn,"SELECT customer.name,customer.email,orders.* FROM customer JOIN orders ON customer.id = orders.customer_id WHERE orders.id = $id");

$cus = mysqli_fetch_assoc($customer_query);
$order_detail = mysqli_query($conn,"SELECT order_detail.*,product.name,product.image FROM order_detail JOIN product ON order_detail.product_id = product.id  WHERE order_id = $id");

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
    <section class="invoice">

      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> AdminLTE, Inc.
          </h2>
        </div>

      </div>

      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>Admin, Inc.</strong><br>
            795 Folsom Ave, Suite 600<br>
            San Francisco, CA 94107<br>
            Phone: (804) 123-5432<br>
            Email: info@almasaeedstudio.com
          </address>
        </div>

        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong><?php echo $cus['name'] ?></strong><br>
            <?php echo $cus['address'] ?><br>
         
            Phone: <?php echo $cus['phone'] ?><br>
            Email: <?php echo $cus['email'] ?>
          </address>
        </div>
      </div>


      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Qty</th>
                <th>Product</th>
                <th>price</th>
                <th>image</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($order_detail  as $key => $value): ?>
                <tr>
                  <td><?php echo $value['quantity'] ?></td>
                  <td><?php echo $value['name'] ?></td>
                  <td><?php echo number_format($value['price']) ?></td>
                  <th>
                    <img src="../uploads/<?php echo $value['image'] ?>" alt="" width="150px" height="150px">
                  </th>
                  <td><?php echo  number_format($value['quantity'] * $value['price'])?>đ</td>
                </tr>
              <?php endforeach ?>
              
            </tbody>
          </table>
        </div>

      </div>


      <div class="row no-print">
        <div class="col-xs-12">
          <a href="order-detail.php?id=<?php echo $id ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include 'footer.php' ?>