<?php include 'header.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $category = mysqli_query($conn , "SELECT * FROM category WHERE id = '$id' ");
        $data = mysqli_fetch_assoc($category);
    }

    // kiểm tra submit chưa ?
    if (isset($_POST['submit'])) {
        // lấy ra thứ cần thêm
        $name = $_POST['name'];
        $status = $_POST['status'];
        // câu lệnh để sửa
        $sql = "UPDATE category SET name = '$name', status = '$status' WHERE id = '$id' ";
        // truy vấn
        $query = mysqli_query($conn, $sql);
        // đúng thì chuyển trang 
        if ($query) {
            header("location:category.php");
        }
    }



?>
<?php include 'sidebar.php' ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                QUẢN LÍ DANH MỤC
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
                <h3 class="box-title">THÊM MỚI DANH MỤC</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form action="" method="post">
                    <div class="form-group">
                      <label for="name">Tên Danh Mục</label>
                      <input type="text" name="name" id="name" class="form-control" placeholder="Tên Danh Mục" value="<?=$data['name']?>" >
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                                <label for="status" class="">Trạng thái</label>
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="status" value="1"
                                <?=$data['status'] == 1 ? "checked" : ""  ?> >Hiện 
                            </label>
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" id="status" value="0"
                            <?=$data['status'] == 0 ? "checked" : ""  ?> >Ẩn
                            </label>
                        </div>
                      </div>
                      <button name="submit" id="" class="btn btn-primary" href="#">Submit</button>
                    </div>
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
<?php include 'footer.php' ?>