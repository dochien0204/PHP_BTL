<?php include 'header.php';
    
    $sql = "SELECT product.*,category.name as 'cate_name' FROM product JOIN category ON product.category_id = category.id";
    $product = mysqli_query($conn,$sql);
  
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
                <h3 class="box-title">Danh sách sản phẩm</h3>

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
                <a href="add-product.php" class="btn btn-success">Thêm mới danh mục</a>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($product as $key => $value): ?>
                        <tr>
                            <td><?php echo $key+1 ?></td>
                            <td><?php echo $value['name'] ?></td>
                            <td><?php echo $value['price'] ?></td>
                            <td><?php echo $value['cate_name'] ?></td>
                            <td>
                                <img src="../uploads/<?php echo $value['image'] ?>" alt="" width="50px">
                            </td>
                            <td><?php echo $value['status'] ? '<span class="bg-green label">Hiện</span>' : '<span class="bg-red label">Ẩn</span>' ?>
                            </td>
                            <td>
                                <a href="edit-product.php?id=<?php echo $value['id'] ?>" title="Sửa"
                                    class="btn btn-primary">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <a href="delete-product.php?id=<?php echo $value['id'] ?>" title="Sửa"
                                    class="btn btn-danger">
                                    <span class="fa fa-trash"></span>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
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