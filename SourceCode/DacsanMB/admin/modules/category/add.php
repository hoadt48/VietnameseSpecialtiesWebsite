<?php 

    $open ='category';

    require_once __DIR__. '/../../autoload/autoload.php';

        if($_SERVER["REQUEST_METHOD"] == "POST")
    { 
            $data=
            [
                'name'=> postInput('name')
                
              
            ];
         $error=[];
         if(postInput('name')=='')
         {
            $error['name']=" Vui lòng nhập lại tên danh mục";
         }
        
         //nếu loi trong có nghĩa là không có lỗi  insert dư  lieu vao
         if(empty($error)){
            $id_insert = $db->insert('category', $data);
            //nếu có dữ liệu thông báo thành công nếu k thì trả về thông báo thất bại!
           if($id_insert > 0)
           {
                 $_SESSION['success']="Thêm mới thành công";
                 redirectAdmin('category');
           }

           else{
              $_SESSION['error']="Thêm mới thất bại";
           }
         }


    }

    
    
    ?>
<?php require_once __DIR__. '/../../layouts/header.php';?>
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Page Content -->
        <h1>Thêm mới danh mục</h1>
        <hr>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo admin_page()?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?php echo modules("category") ?>">Danh mục</a>
            </li>
            <li class="breadcrumb-item active">Thêm mới</li>

          </ol>
        <div class="row">
            <div class="col-md-5">
                <form role="form" class="form-horizontal" method="POST">
                    <div class="form-group"  action="" >
                        <label for="exampleInputEmail1" >Thêm mới danh mục</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" autofocus="autofocus" placeholder="Tên danh mục" name="name">

  <!--  nếu name là trống thì thông báo nhập dữ liệu -->
                  <?php if (isset($error["name"])): ?>
                    <p clase="text-danger"> <?php echo $error["name"]; ?> </p>
                    <?php endif ?>      
                           
                    </div>
                    <button type="submit" class="btn btn-success">Lưu</button>
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
<?php require_once __DIR__. '/../../layouts/footer.php';?>