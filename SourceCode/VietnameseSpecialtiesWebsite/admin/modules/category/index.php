<?php
require_once __DIR__ . '\..\..\autoload\autoload.php';
$open = "category";
$category = $db->fetchAll("category");
?>

<?php require_once __DIR__ . '\..\..\layouts\header.php'; ?>
<div id="content-wrapper">
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo admin_page() ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Danh mục </li>
            <li class="breadcrumb-item active">
            </li>
            <li class="btn btn-success">
                <a href="add.php">Thêm mới</a>
            </li>
        </ol>
        <!-- Breadcrumbs-->
        <div class="clearfix">
            <?php require_once __DIR__ . '\..\..\..\partials\notification.php'; ?>
        </div>
        <!-- Page Content --> 
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Danh mục</div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" role="grid" aria-describedby="dataTable_info" style="width: 100%;" width="100%" cellspacing="0">
                                    <thead>
                                        <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 5px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">STT</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 254px;" aria-label="Position: activate to sort column ascending">Name</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 118px;" aria-label="Office: activate to sort column ascending">Slug</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 55px;" aria-label="Age: activate to sort column ascending">Created_at</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 114px;" aria-label="Start date: activate to sort column ascending">Action</th></tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $stt = 1;
                                            foreach ($category as $item): ?>
                                                <tr role="row" class="even">
                                                    <td class="sorting_1"><?php echo $stt?></td>
                                                    <td><?php echo $item['name']?></td>
                                                    <td><?php echo $item['slug']?></td>
                                                    <td><?php echo $item['created_at']?></td>
                                                    <td>
                                                        <a class="btn btn-info" href="edit.php?id=<?php echo $item['id']?>"><i class="fa fa-edit"> </i> Sửa</a>
                                                        <a class="btn btn-danger" href="delete.php?id=<?php echo $item['id']?>"><i class="fa fa-times"> </i> Xoá</a>
                                                    </td>
                                                </tr>
                                        <?php $stt++; endforeach;?>
                                    </tbody>
                                </table></div></div>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Your Website 2019</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->
<?php require_once __DIR__ . '\..\..\layouts\footer.php'; ?>