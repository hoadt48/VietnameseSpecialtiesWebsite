<?php
require_once __DIR__ . '\..\..\autoload\autoload.php';
$data = 
[
   "name" => postInput('name')
];
$error = [];
if(postInput('name') == '')
{
    $error['name'] = " Làm ơn nhập lại tên danh mục!";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = postInput("name");
}

if (empty($error['name'])) {
    $id_insert = $db->insert("category", $data);
}
?>

<?php require_once __DIR__ . '\..\..\layouts\header.php'; ?>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Pages</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <h6 class="dropdown-header">Login Screens:</h6>
                <a class="dropdown-item" href="login.html">Login</a>
                <a class="dropdown-item" href="register.html">Register</a>
                <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header">Other Pages:</h6>
                <a class="dropdown-item" href="404.html">404 Page</a>
                <a class="dropdown-item active" href="blank.html">Blank Page</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span></a>
        </li>
    </ul>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="index.html">Danh mục</a>
                </li>
                <li class="breadcrumb-item active">
                    <i class="fa fa-file"></i> Thêm mới
                </li>
            </ol>

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
                                        <?php
                                        if (isset($error["name"])):?>
                                        <p clase="text-danger">
                                            <?php 
                                                echo $error["name"];
                                            ?>
                                        </p>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Register</button>
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