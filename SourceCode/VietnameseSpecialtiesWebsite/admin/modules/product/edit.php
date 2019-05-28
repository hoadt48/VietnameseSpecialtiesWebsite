<?php
require_once __DIR__ . '\..\..\autoload\autoload.php';
$open = "product";
$data = [
    "name" => postInput('name'),
    "slug" => to_slug(postInput("name"))
];

$id = intval(getInput('id'));
$Editproduct = $db->fetchID('product', $id);
if (empty($Editproduct)) {
    $_SESSION['error'] = editPageMessage['empty'];
    redirectAdmin("product");
}

$error = [];


if (postInput('name') == '') {
    $error['name'] = editPageMessage['empty'];
}

if (empty($error)) {
    $isset = $db->fetchOne("product", " name = '" . $data['name'] . "'");
    if ($Editproduct['name'] != $data['name']) {
        if (count($isset) > 0) {
            $_SESSION['error'] = editPageMessage['alive'];
        } else {
            $id_update = $db->update("product", $data, array('id' => $id));
            if ($id_update > 0) {
                $_SESSION['success'] = editPageMessage['succes'];
                redirectAdmin("product");
            } else {
                $_SESSION['error'] = editPageMessage['error'];
            }
        }
    } else {
        $id_update = $db->update("product", $data, array('id' => $id));
        if ($id_update > 0) {
            $_SESSION['success'] = editPageMessage['succes'];
            redirectAdmin("product");
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
                <a href="<?php echo modules("product") ?>">Sản phẩm</a>
            </li>
            <li class="breadcrumb-item active">
                <i class="fa fa-file"></i> Sửa Sản phẩm
            </li>
        </ol>
        <!-- Breadcrumbs-->
        <div class="clearfix">
            <?php require_once __DIR__ . '\..\..\..\partials\notification.php'; ?>
        </div>
        <!-- Page Content -->
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Sửa Sản phẩm</div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" id="productName" class="form-control" placeholder="Tên Sản phẩm" autofocus="autofocus" name="name" value="<?php echo $Editproduct['name']?>">
                                    <label for="productName">Tên Sản phẩm</label>
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