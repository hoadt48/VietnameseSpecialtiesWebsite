<?php 

    $open ='posts';

    require_once __DIR__. '/../../autoload/autoload.php';
    $id=intval(getInput('id'));

    $EditPosts=$db->fetchID('posts',$id);
    if(empty($EditPosts))
    {
        $_SESSION['error']='Dữ liệu không tồn vui lòng chọn lại dữ liệu cần sửa';
        redirectAdmin('posts');
    }


   $posts=$db->fetchAll("posts");

        if($_SERVER["REQUEST_METHOD"] == "POST")
    { 
            $data=
            [
                'title'=> postInput('title'),
                'content'=> postInput('content'),
              
            ];
         $error=[];
         if(postInput('title')=='')
         {
            $error['title']=" Vui lòng nhập lại tên chủ đề bài viết";
         }
         if(postInput('content')=='')
         {
            $error['content']=" Vui lòng nhập lại nội dung bài viết";
         }
         //nếu loi trong insert dư  lieu vao
         if(empty($error)){

                //lấy tên file bao gồm 
            if(isset($_FILES['thunbar']))
            {
                 $file_name=$_FILES['thunbar']['name'];//tên file upload
                $file_tmp=$_FILES['thunbar']['tmp_name'];//đường dẫn đến file upload ở client;
                $file_type=$_FILES['thunbar']['type'];// kiểu file mà bạn upload(hình ảnh, word..)
                $file_error=$_FILES['thunbar']['error'];// trang thái của file upload, 0 => không có lỗi
                if($file_error==0)
              {
                $part = ROOT.'product/';
                $data['thunbar']=$file_name;
              }
            }

            $id_update = $db->update('posts', $data,array('id'=>$id));
            //nếu có dữ liệu thông báo thành công nếu k thì trả về thông báo thất bại!
           if($id_update > 0)
           {
                 $_SESSION['success']="Sửa thành công";
                 redirectAdmin('posts');
           }

           else{
              $_SESSION['error']="Sửa dữ liệu thất bại";
           }
         }

    }

    
    
    ?>
<?php require_once __DIR__. '/../../layouts/header.php';?>
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Page Content -->
        <h1>Thêm mới bài viết</h1>
        <hr>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="index.html">Bài viết</a>
            </li>
            <li class="breadcrumb-item active">Thêm mới</li>
        </ol>
        <div class="row">
            <div class="col-md-5">
                <form role="form" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <div class="form-group"  action="" >
                        <label for="exampleInputEmail1" >Sửa bài viết</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" autofocus="autofocus" placeholder="Tên chủ đề" name="title" value="<?php echo $EditPosts['title'] ; ?>">

  <!--  nếu name là trống thì thông báo nhập dữ liệu -->
                  <?php if (isset($error["title"])): ?>
                    <p clase="text-danger"> <?php echo $error["title"]; ?> </p>
                    <?php endif ?> 

                   <div class="form-group">
                <label for="exampleInputEmail1"><h6>Nội dung </h6></label>
                 <textarea type="text" name="content" class="form-control "  cols="exampleInputEmail1" rows="5" placeholder="nội dung" name="content" ><?php echo $EditPosts['content'] ; ?></textarea>
                 <?php if (isset($error["content"])): ?>
                <p clase="text-danger"> <?php echo $error["content"]; ?> </p>
                <?php endif ?>     
              </div>


             <div class="form-group">
                <label for="exampleInputEmail1"> <h6>Hình ảnh</h6> </label>
                <input type="file" class="col-sm-9 form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Hình ảnh" name="thunbar" >
                <?php if (isset($error["thunbar"])): ?>
                    <p clase="text-danger"> <?php echo $error["thunbar"]; ?> </p>
                    <?php endif ?> 
                     <img src="<?php echo uploads()?>product/<?php echo $EditPosts['thunbar']?>" width='50px' height='50px'>

                </div>   
                           
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