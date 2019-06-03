<?php
require_once __DIR__ . '\..\..\autoload\autoload.php';
$open = "admin";
$open = "category";
$category = $db->fetchAll("category");
$id = intval(getInput('id'));
$Editadmin = $db->fetchID('admin', $id);
if (empty($Editadmin)) {
    $_SESSION['error'] = editPageMessage['empty'];
    redirectAdmin("admin");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [ 
        "name" => postInput('name'),
        "password" => postInput('password'),
        "address" => postInput("address"),
        "email" => postInput("email"),
        "avatar" => postInput("avatar"),
        "phone" => postInput("phone"),
        "level" => postInput("level")
    ];
    $error = [];
    if (postInput('name') == '') {
        $error['name'] = editPageMessage['empty'];
    }
    if (postInput('password') == '') {
        $data['password'] = $Editadmin['empty'];
    }
    if (postInput('address') == '') {
        $error['address'] = editPageMessage['empty'];
    }
    if (postInput('email') == '') {
        $error['email'] = editPageMessage['empty'];
    }
    if (postInput('phone') == '') {
        $error['phone'] = editPageMessage['empty'];
    }
    if (postInput('level') == '') {
        $error['level'] = editPageMessage['empty'];
    }

    if (empty($error['name'])) {
        if (isset($_FILES['avatar']) && $_FILES['avatar']['name'] != NULL) {
            $file_name = $_FILES['avatar']['name'];
            $file_tmp = $_FILES['avatar']['tmp_name'];
            $file_type = $_FILES['avatar']['type'];
            $file_erro = $_FILES['avatar']['error'];

            if ($file_erro == 0) {
                $uploads_dir = ROOT . "public/upload/admin/";
                $data['avatar'] = $file_name;
            }
            move_uploaded_file($file_tmp, $uploads_dir . $file_name);
        }
        else {
            $data['avatar'] = $Editadmin['avatar'];
        }
        _debug($data);
        $id_update = $db->update("admin", $data, array('id' => $id));
        if ($id_update) {
            $_SESSION['success'] = editPageMessage['succes'];
            redirectAdmin("admin");
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
                <a href="<?php echo modules("admin") ?>">Admin</a>
            </li>
            <li class="breadcrumb-item active">
                <i class="fa fa-file"></i> Sửa Admin
            </li>
        </ol>
        <!-- Breadcrumbs-->
        <div class="clearfix">
            <?php require_once __DIR__ . '\..\..\..\partials\notification.php'; ?>
        </div>
        <!-- Page Content -->
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Sửa Admin</div>
            <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" id="adminName" class="form-control" placeholder="Tên Admin" autofocus="autofocus" name="name" value="<?php echo $Editadmin['name']?>">
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
                                    <input type="text" id="passwordName" class="form-control" placeholder="9000000" name="password" value="<?php echo $Editadmin['password']?>">
                                    <label for="passwordName">Password</label>
                                    <?php if (isset($error["password"])): ?>
                                        <p clase="text-danger">
                                            <?php echo $error["password"]; ?>
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
                                    <input type="text" id="cPasswordName" class="form-control" placeholder="9000000" name="cPassword">
                                    <label for="cPasswordName">Confirm Password</label>
                                    <?php if (isset($error["cPassword"])): ?>
                                        <p clase="text-danger">
                                            <?php echo $error["cPassword"]; ?>
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
                                    <input type="text" id="phoneName" class="form-control" placeholder="9000000" name="number" value="<?php echo $Editadmin['phone']?>">
                                    <label for="phoneName">Phone</label>
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
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" id="levelName" class="form-control" placeholder="9000000" name="number" value="<?php echo $Editadmin['level']?>">
                                    <label for="levelName">Phone</label>
                                    <?php if (isset($error["level"])): ?>
                                        <p clase="text-danger">
                                            <?php echo $error["level"]; ?>
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
                                    <input type="text" id="saleName" class="form-control" placeholder="10%" name="sale" value="<?php echo $Editadmin['sale']?>">
                                    <label for="saleName">Giảm Giá Admin</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="file" id="avatar" class="form-control" name="avatar" value="<?php echo $Editadmin['avatar']?>">
                                    <label for="fileName">Hình Ảnh Admin</label>
                                    <img src="<?php echo uploads()?>admin/<?php echo $Editadmin['avatar']?>" width="40px" height="40px">
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
                                    <textarea placeholder="Thông tin Admin" name="content" rows="4" type="text" class="form-control"><?php echo $Editadmin['content']?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Xác nhận</button>
                </form>
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