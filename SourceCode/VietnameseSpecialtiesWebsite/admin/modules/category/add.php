<?php
require_once __DIR__ . '\..\..\autoload\autoload.php';
$open = "category";
$data = [
    "name" => postInput('name'),
    "slug" => to_slug(postInput("name"))
];
$error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (postInput('name') == '') {
        $error['name'] = addPageMessage['empty'];
    }
    if (empty($error['name'])) {
        $isset = $db->fetchOne("category", " name = '" . $data['name'] . "'");
        if (count($isset) > 0) {
            $_SESSION['error'] = addPageMessage['alive'];
        } else {
            $id_insert = $db->insert("category", $data);
            if ($id_insert > 0) {
                $_SESSION['success'] = addPageMessage['succes'];
                redirectAdmin("category");
            } else {
                $_SESSION['error'] = addPageMessage['error'];
            }
        }
    }
}
?>

<?php require_once __DIR__ . '\..\..\layouts\header.php'; ?>
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo admin_page() ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?php echo modules("category") ?>">Danh mục</a>
            </li>
            <li class="breadcrumb-item active">
                <i class="fa fa-file"></i> Thêm mới
            </li>
        </ol>
        <!-- Breadcrumbs-->
        <div class="clearfix">
            <?php require_once __DIR__ . '\..\..\..\partials\notification.php'; ?>
        </div>
        <!-- Page Content -->
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Thêm mới danh mục</div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" id="categoryName" class="form-control" placeholder="Tên danh mục" autofocus="autofocus" name="name">
                                    <label for="categoryName">Tên danh mục</label>
                                    <?php if (isset($error["name"])): ?>
                                        <p clase="text-danger">
                                            <?php echo $error["name"]; ?>
                                        </p>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Xác nhận</button>
                </form>
            </div>
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