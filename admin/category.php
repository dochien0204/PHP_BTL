<?php include 'header.php';
    
    $sql = "SELECT * FROM category";
    $category = mysqli_query($conn,$sql);
    $total = mysqli_num_rows($category);
    $limit = 4;  
    $page = ceil($total/$limit);
    $curent_page = isset($_GET['page']) ?  $_GET['page'] : 1;
    $start = $limit * ($curent_page - 1);
    $category = mysqli_query($conn,"SELECT * FROM category LIMIT $start,$limit");
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
            Quản lý danh mục
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
                <h3 class="box-title">Danh sách danh mục</h3>

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
                <a href="add-category.php" class="btn btn-success">Thêm mới danh mục</a>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên Danh mục</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($category as $key => $value): ?>
                        <tr>
                            <td><?php echo $key+1 ?></td>
                            <td><?php echo $value['name'] ?></td>
                            <td><?php echo $value['status'] ? '<span class="bg-green label">Hiện</span>' : '<span class="bg-red label">Ẩn</span>' ?>
                            </td>
                            <td>
                                <a href="edit_category.php?id=<?= $value['id'] ?>" title="Sửa" class="btn btn-primary">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <a href="delete_category.php?id=<?= $value['id'] ?>" title="Xóa" class="btn btn-danger">
                                    <span class="fa fa-trash"></span>
                                </a>

                            </td>
                        </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
                <ul class="pagination">
                    <li><a href="category.php?page=<?php echo $curent_page - 1 ?>">&laquo;</a></li>
                    <?php for ($i=1;$i<=$page;$i++): ?>
                    <li class="<?php echo ($curent_page==$i) ? 'active': ''?>"><a
                            href="category.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                    <?php endfor ?>
                    <li><a href="category.php?page=<?php echo $curent_page + 1 ?>">&raquo;</a></li>
                </ul>
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