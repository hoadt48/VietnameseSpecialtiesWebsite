<!DOCTYPE html>
<html>
    <head>
        <title>Website: Đặc sản Miền Bắc</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/bootstrap.min.css">
        <script  src="<?php echo base_url() ?>public/frontend/js/jquery-3.2.1.min.js"></script>
        <script  src="<?php echo base_url() ?>public/frontend/js/bootstrap.min.js"></script>
        <!---->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick-theme.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/style.css">
    </head>
    <body>
        <div id="wrapper">
            <!---->
            <!--HEADER-->
            <div id="header">
                <div id="header-top">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-6" id="header-text">
                                <a>Đỗ Hoa</a><b>ĐẶC SẢN MIỀN BẮC</b>
                            </div>
                            <div class="col-md-6">
                                <nav id="header-nav-top">
                                    <ul class="list-inline pull-right" id="headermenu">
                                 <?php  if(isset($_SESSION['name_user'])) : ?> 
                                 <li> Xin chào: <?php echo ($_SESSION['name_user']); ?></li> 
                                  <li>
                                            <a href=""><i class="fa fa-user"></i> Tài khoản<i class="fa fa-caret-down"></i></a>
                                            <ul id="header-submenu">
                                                <li><a href="">Thông tin</a></li>
                                                <li><a href="gio_hang.php">Giỏ hàng</a></li>
                                                 <li><a href="thoat.php"><i class="fa fa-share-square-o"></i>Thoát</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href=""><i class="fa fa-share-square-o"></i>Kiểm tra</a>
                                        </li> 

                                <?php else : ?>
                                         <li>
                                            <a href="login.php"><i class="fa fa-unlock"></i> Đăng nhập</a>
                                        </li>
                                         <li>
                                            <a href="register.php"><i class="fa fa-user"></i> Đăng ký</a>
                                        </li>
                             <?php endif ?>
                                       
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row" id="header-main">
                        <div class="col-md-5">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label>
                                        <select name="category" class="form-control">
                                            <option> All Category</option>
                                            <option> Hà nội </option>
                                            <option> Phú Thọ </option>
                                            <option> Hưng Yên </option>
                                            <option> Bắc Giang </option>
                                        </select>
                                    </label>
                                    <input type="text" name="keywork" placeholder=" Search for   " class="form-control">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <a href="">
                            <img src="<?php echo base_url() ?>public/frontend/images/logo.png">
                            </a>
                        </div>
                        <div class="col-md-3" id="header-right">
                            <div class="pull-right">
                                <div class="pull-left">
                                    <i class="glyphicon glyphicon-phone-alt"></i>
                                </div>
                                <div class="pull-right">
                                    <p id="hotline">HOTLINE</p>
                                    <p>0964499835</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END HEADER-->
            <!--MENUNAV-->
            <div id="menunav">
                <div class="container">
                    <nav>
                        <div class="home pull-left">
                            <a href="index.php">Trang chủ</a>
                        </div>
                        <!--menu main-->
                        <ul id="menu-main">
                            <li>
                                <a href="ban_do.php">Shop</a>
                            </li>
                            <li>
                                <a href="">Contact</a>
                            </li>
                            <li>
                                <a href="">Blog</a>
                            </li>
                            <li>
                                <a href="">About us</a>
                            </li>
                        </ul>
                        <!-- end menu main-->
                        <!--Shopping-->
                        <ul class="pull-right" id="main-shopping">
                            <li>
                                <a href="gio_hang.php"><i class="fa fa-shopping-basket"></i> My Cart </a>
                            </li>
                        </ul>
                        <!--end Shopping-->
                    </nav>
                </div>
            </div>
            <!--ENDMENUNAV-->
            <div id="maincontent">
                <div class="container">
                    <div class="col-md-3  fixside" >
                        <div class="box-left box-menu" >
                            <h3 class="box-title"><i class="fa fa-list"></i>  Danh mục</h3>
                                <ul>  
                                   <?php foreach ($category as $item): ?>
                                    <li><a href="danh_muc_sp.php? id=<?php echo $item['id']?>"><?php echo $item['name']; ?></a></li>
                                    <?php endforeach;   ?>
                                </ul>

                        </div>
                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm mới </h3>
                                                      <ul>
                                <?php foreach ($productNew as $item): ?>
                                    
                                <li class="clearfix">
                                    <a href="">
                                        <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar']?>" class="img-responsive pull-left" width="120" height="120">
                                        <div class="info pull-right">
                                            <p class="name"> <?php echo $item['name'] ?></p >
                                            <b class="price"><?php echo $item['price'] ?> đ</b><br>
                                            <b class="sale"><?php echo $item['price'] ?> đ</b><br>
                                            <span class="view"><i class="fa fa-eye"></i> 9999999 : <i class="fa fa-heart-o"></i> 99</span>
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                               
                            </ul>
                            <!-- </marquee> -->
                        </div>
                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm mới </h3>
                          <!--  -->
                  
                            <!-- </marquee> -->
                        </div>
                    </div>
                   <!--  <<div> vi du index -->
                   