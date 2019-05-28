<?php
require_once __DIR__ . '\..\..\autoload\autoload.php';
$open = "category";
$category = $db->fetchAll("category");
$open = "product";
$data = [
    "name" => postInput('name'),
    "slug" => to_slug(postInput("name"))
];
$error = [];
if (postInput('name') == '') {
    $error['name'] = addPageMessage['empty'];
}
if (postInput('category') == '') {
    $error['category'] = addPageMessage['empty'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = postInput("name");
}

if (empty($error['name'])) {
    $isset = $db->fetchOne("product", " name = '" . $data['name'] . "'");
    if (count($isset) > 0) {
        $_SESSION['error'] = addPageMessage['alive'];
    } else {
        $id_insert = $db->insert("product", $data);
        if ($id_insert > 0) {
            $_SESSION['success'] = addPageMessage['succes'];
            redirectAdmin("product");
        } else {
            $_SESSION['error'] = addPageMessage['error'];
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
                <i class="fa fa-file"></i> Thêm mới
            </li>
        </ol>
        <!-- Breadcrumbs-->
        <div class="clearfix">
            <?php require_once __DIR__ . '\..\..\..\partials\notification.php'; ?>
        </div>
        <!-- Page Content -->
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Thêm mới Sản phẩm</div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" id="productName" class="form-control" placeholder="Tên Sản phẩm" autofocus="autofocus" name="name">
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
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <select type="text" id="categoryName" class="form-control" placeholder="Tên Danh Mục" name="category">
                                        <option value=""> Tên danh mục </option>
                                        <?php foreach ($category as $item) : ?>
                                        <option value="<?php echo $item['id'] ?>"> <?php echo $item['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php if (isset($error["category"])): ?>
                                        <p clase="text-danger">
                                            <?php echo $error["category"]; ?>
                                        </p>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" id="priceName" class="form-control" placeholder="9000000" name="price">
                                    <label for="priceName">Giá Sản phẩm</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="saleName" class="form-control" placeholder="10%" name="sale" value="0">
                                    <label for="saleName">Giảm Giá Sản phẩm</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="file" id="pictureName" class="form-control" name="picture">
                                    <label for="saleName">Hình Ảnh Sản phẩm</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <textarea placeholder="Thông tin sản phẩm" name="content" rows="4" type="text" class="form-control"></textarea>
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