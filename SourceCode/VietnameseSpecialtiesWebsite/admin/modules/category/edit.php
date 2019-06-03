<?php
require_once __DIR__ . '\..\..\autoload\autoload.php';
$open = "category";
$data = [
    "name" => postInput('name'),
    "slug" => to_slug(postInput("name"))
];

$id = intval(getInput('id'));
$EditCategory = $db->fetchID('category', $id);
if (empty($EditCategory)) {
    $_SESSION['error'] = editPageMessage['empty'];
    redirectAdmin("category");
}

$error = [];


if (postInput('name') == '') {
    $error['name'] = editPageMessage['empty'];
}

if (empty($error)) {
    $isset = $db->fetchOne("category", " name = '" . $data['name'] . "'");
    if ($EditCategory['name'] != $data['name']) {
        if (count($isset) > 0) {
            $_SESSION['error'] = editPageMessage['alive'];
        } else {
            $id_update = $db->update("category", $data, array('id' => $id));
            if ($id_update > 0) {
                $_SESSION['success'] = editPageMessage['succes'];
                redirectAdmin("category");
            } else {
                $_SESSION['error'] = editPageMessage['error'];
            }
        }
    } else {
        $id_update = $db->update("category", $data, array('id' => $id));
        if ($id_update > 0) {
            $_SESSION['success'] = editPageMessage['succes'];
            redirectAdmin("category");
        } else {
            $_SESSION['error'] = editPageMessage['error'];
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
                <i class="fa fa-file"></i> Sửa danh mục
            </li>
        </ol>
        <!-- Breadcrumbs-->
        <div class="clearfix">
            <?php require_once __DIR__ . '\..\..\..\partials\notification.php'; ?>
        </div>
        <!-- Page Content -->
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Sửa danh mục</div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" id="categoryName" class="form-control" placeholder="Tên danh mục" autofocus="autofocus" name="name" required="true" value="<?php echo $EditCategory['name']?>">
                                    <label for="categoryName">Tên danh mục</label>
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