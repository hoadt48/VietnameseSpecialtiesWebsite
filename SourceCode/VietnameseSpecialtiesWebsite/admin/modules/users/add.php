<?php
require_once __DIR__ . '\..\..\autoload\autoload.php';
$open = "category";
$category = $db->fetchAll("category");
$open = "users";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        "name" => postInput('name'),
        "password" => to_password(postInput("name")),
        "price" => postInput("price"),
        "content" => postInput("content"),
        "avatar" => postInput("avatar"),
        "number" => postInput("number"),
        "sale" => postInput("sale")
    ];
    $error = [];
    if (postInput('name') == '') {
        $error['name'] = addPageMessage['empty'];
    }
    if (postInput('category_id') == '') {
        $error['category'] = addPageMessage['empty'];
    }
    if (postInput('price') == '') {
        $error['price'] = addPageMessage['empty'];
    }
    if (postInput('sale') == '') {
        $error['sale'] = addPageMessage['empty'];
    }
    if (postInput('content') == '') {
        $error['content'] = addPageMessage['empty'];
    }

    if (postInput('number') == '') {
        $error['number'] = addPageMessage['empty'];
    }

    if (!isset($_FILES['avatar'])) {
        $error['avatar'] = addPageMessage['empty'];
    }

    if (empty($error)) {
        if (isset($_FILES['avatar'])) {
            $file_name = $_FILES['avatar']['name'];
            $file_tmp = $_FILES['avatar']['tmp_name'];
            $file_type = $_FILES['avatar']['type'];
            $file_erro = $_FILES['avatar']['error'];

            if ($file_erro == 0) {
                $uploads_dir = ROOT . "public/upload/users/";
                $data['avatar'] = $file_name;
            }
        }
        $id_insert = $db->insert("users", $data);
        if ($id_insert) {
            move_uploaded_file($file_tmp, $uploads_dir . $file_name);
            $_SESSION['success'] = addPageMessage['succes'];
            redirectAdmin("users");
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
                <a href="<?php echo modules("users") ?>">Users</a>
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
            <div class="card-header">Thêm mới Users</div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" id="usersName" class="form-control" placeholder="Tên Users" autofocus="autofocus" name="name">
                                    <label for="usersName">Tên Users</label>
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
                                    <input type="text" id="priceName" class="form-control" placeholder="9000000" name="price">
                                    <label for="priceName">Giá Users</label>
                                    <?php if (isset($error["price"])): ?>
                                        <p clase="text-danger">
                                            <?php echo $error["price"]; ?>
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
                                    <input type="text" id="numberName" class="form-control" placeholder="9000000" name="number">
                                    <label for="numberName">Số Lượng Users</label>
                                    <?php if (isset($error["number"])): ?>
                                        <p clase="text-danger">
                                            <?php echo $error["number"]; ?>
                                        </p>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="saleName" class="form-control" placeholder="10%" name="sale" value="0">
                                    <label for="saleName">Giảm Giá Users</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="file" id="avatar" class="form-control" name="avatar">
                                    <label for="fileName">Hình Ảnh Users</label>
                                    <?php if (isset($error["avatar"])): ?>
                                        <p clase="text-danger">
                                            <?php echo $error["avatar"]; ?>
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
                                    <textarea placeholder="Thông tin Users" name="content" rows="4" type="text" class="form-control"></textarea>
                                    <?php if (isset($error["price"])): ?>
                                        <p clase="text-danger">
                                            <?php echo $error["price"]; ?>
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