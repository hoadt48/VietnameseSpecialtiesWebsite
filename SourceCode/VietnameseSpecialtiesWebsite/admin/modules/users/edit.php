<?php
require_once __DIR__ . '\..\..\autoload\autoload.php';
$open = "users";
$open = "category";
$category = $db->fetchAll("category");
$id = intval(getInput('id'));
$Editusers = $db->fetchID('users', $id);
if (empty($Editusers)) {
    $_SESSION['error'] = editPageMessage['empty'];
    redirectAdmin("users");
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
                $uploads_dir = ROOT . "public/upload/users/";
                $data['avatar'] = $file_name;
            }
            move_uploaded_file($file_tmp, $uploads_dir . $file_name);
        }
        else {
            $data['avatar'] = $Editusers['avatar'];
        }
        _debug($data);
        $id_update = $db->update("users", $data, array('id' => $id));
        if ($id_update) {
            $_SESSION['success'] = editPageMessage['succes'];
            redirectAdmin("users");
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
                <a href="<?php echo modules("users") ?>">Users</a>
            </li>
            <li class="breadcrumb-item active">
                <i class="fa fa-file"></i> Sửa Users
            </li>
        </ol>
        <!-- Breadcrumbs-->
        <div class="clearfix">
            <?php require_once __DIR__ . '\..\..\..\partials\notification.php'; ?>
        </div>
        <!-- Page Content -->
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Sửa Users</div>
            <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" id="usersName" class="form-control" placeholder="Tên Users" autofocus="autofocus" name="name" value="<?php echo $Editusers['name']?>">
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
                                    <input type="text" id="priceName" class="form-control" placeholder="9000000" name="price" value="<?php echo $Editusers['price']?>">
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
                                    <input type="text" id="numberName" class="form-control" placeholder="9000000" name="number" value="<?php echo $Editusers['number']?>">
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
                                    <input type="text" id="saleName" class="form-control" placeholder="10%" name="sale" value="<?php echo $Editusers['sale']?>">
                                    <label for="saleName">Giảm Giá Users</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="file" id="avatar" class="form-control" name="avatar" value="<?php echo $Editusers['avatar']?>">
                                    <label for="fileName">Hình Ảnh Users</label>
                                    <img src="<?php echo uploads()?>users/<?php echo $Editusers['avatar']?>" width="40px" height="40px">
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
                                    <textarea placeholder="Thông tin Users" name="content" rows="4" type="text" class="form-control"><?php echo $Editusers['content']?></textarea>
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