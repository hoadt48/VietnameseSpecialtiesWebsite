<?php
require_once __DIR__ . '\..\..\autoload\autoload.php';
$open = "admin";
$data = [
        "name" => postInput('name'),
        "email" => postInput("email"),
        "phone" => postInput("phone"),
        "password" => MD5("password"),
        "level" => postInput("level")
    ];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = [];
    if (postInput('name') == '') {
        $error['name'] = addPageMessage['empty'];
    }
    if (postInput('email') == '') {
        $error['email'] = addPageMessage['empty'];
    }
 else {
        $is_check = $db->fetchOne("admin"," email = '".$data['email']."' ");
        if ($is_check != NULL)
        {
            $error['email'] = addPageMessage['alive'];
        }
    }
    if (postInput('password') == '') {
        $error['password'] = addPageMessage['empty'];
    }
    if (postInput('confirmpassword') == '') {
        $error['confirmpassword'] = addPageMessage['empty'];
    }
    if (postInput('password') != postInput('confirmpassword')) {
        $error['confirmpassword'] = addPageMessage['confirm_error'];
    }
    if (postInput('phone') == '') {
        $error['phone'] = addPageMessage['empty'];
    }
    if (empty($error)) {
        $id_insert = $db->insert("admin", $data);
        if ($id_insert) {
            $_SESSION['success'] = addPageMessage['succes'];
            redirectAdmin("admin");
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
                <a href="<?php echo modules("admin") ?>">Admin</a>
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
            <div class="card-header">Thêm mới Admin</div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" id="adminName" class="form-control" placeholder="Tên Admin" autofocus="autofocus" name="name">
                                    <label for="adminName">Tên Admin</label>
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
                                    <input type="text" id="emailName" class="form-control" placeholder="9000000" name="email">
                                    <label for="emailName">Email</label>
                                    <?php if (isset($error["email"])): ?>
                                        <p clase="text-danger">
                                            <?php echo $error["email"]; ?>
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
                                    <input type="text" id="phoneName" class="form-control" placeholder="9000000" name="phone">
                                    <label for="phoneName">Số điện thoại</label>
                                    <?php if (isset($error["phone"])): ?>
                                        <p clase="text-danger">
                                            <?php echo $error["phone"]; ?>
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
                                    <input type="password" id="passwordName" class="form-control" placeholder="*******" name="password" value="">
                                    <label for="passwordName">Password</label>
                                    <?php if (isset($error["password"])): ?>
                                        <p clase="text-danger">
                                            <?php echo $error["password"]; ?>
                                        </p>
                                    <?php endif ?>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="password" id="confirmPasswordName" class="form-control" placeholder="*******" name="confirmpassword" value="">
                                    <label for="confirmPasswordName"> Xác nhận Password</label>
                                    <?php if (isset($error["confirmpassword"])): ?>
                                        <p clase="text-danger">
                                            <?php echo $error["confirmpassword"]; ?>
                                        </p>
                                    <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <select type="text" id="category_id" class="form-control" placeholder="level" name="level">
                                        <option value="0"> Admin </option>
                                        <option value="1"> User </option>
                                    </select>
                                    <?php if (isset($error["level"])): ?>
                                        <p clase="text-danger">
                                            <?php echo $error["level"]; ?>
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