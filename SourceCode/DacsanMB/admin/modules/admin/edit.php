<?php 
$open ='category';
    $open ='admin';

   require_once __DIR__. '/../../autoload/autoload.php';
   $id=intval(getInput('id'));

    $EditAdmin=$db->fetchID('admin',$id);
    if(empty($EditAdmin))
    {
        $_SESSION['error']='Dữ liệu không tồn vui lòng chọn lại dữ liệu cần sửa';
        redirectAdmin('admin');
    }

        if($_SERVER["REQUEST_METHOD"] == "POST")
    { 
            $data=

            [    
                'name'=> postInput('name'),        
                'email'=> postInput('email'),
                'phone'=> postInput('phone'), 
                'address'=> postInput('address'),
                'level'=> postInput('level')
                          
            ];

         $error=[];

         if(postInput('name')=='')
         {
            $error['name']=" Vui lòng nhập lại tên danh mục";
         }

           if(postInput('email')=='')
         {
            $error['email']=" Vui lòng nhập email";
         }
          else {
            if(postInput('email')!= $EditAdmin['email']){

               $is_email= $db->fetchOne("admin"," email= '".$data['email']."' ");
            if($is_email!=NULL)
            {
               $error['email']="Email đã tồn tại";
            }
            }
           
          }




            if(postInput('phone')=='')
         {
            $error['phone']=" Vui lòng nhập lại số điện thoại ";
         }
         /*   if(postInput('password')=='')
         {
            $error['password']=" Vui lòng nhập lại password ";
         }*/

           if(postInput('address')=='')
         {
            $error['address']=" Vui lòng nhập lại địa chỉ";
         }

       /* if($data['password']!= MD5(postInput('re_password'))){

          $error['re_password']="Mật khẩu không khớp vui lòng nhập lai!";
        }*/



        if(postInput('password')!=NULL && postInput('re_password')!=NULL){
         if (postInput('password')!= postInput('re_password')) {
          
            $error['re_password']=" Mật khẩu không khớp, vui lòng nhập lại";
          } 
          else {
            $data['password']=MD5(postInput('password'));
          }
        }

         //nếu loi trong co nghinsert dư  lieu vao
         if(empty($error)){

            $id_update=$db->update('admin',$data,array('id'=>$id));
        
            if($id_update>0){
              $_SESSION['success']= "Sửa thành công";
              redirectAdmin('admin');
            }
            else {
              $_SESSION['error']="Sửa thất bại";
              
            }
         }

    }

    
    
    ?>
<?php require_once __DIR__. '/../../layouts/header.php';?>
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Page Content -->
        <h1>Sửa thông tin quản lý</h1>
        <hr>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo admin_page() ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?php echo modules("admin") ?>">Admin</a>
            </li>
            <li class="breadcrumb-item active">Sửa</li>

          </ol>


<div class="row">
  <div class="col-md-5">
    <form method="POST" enctype ="multipart/form-data">
 
  <div class="form-group" >
     <label for="exampleInputEmail1"><h6>Họ tên </h6></label>
    <input type="text" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="họ tên" name="name" value="<?php echo $EditAdmin['name'] ; ?>" > 
     <?php if (isset($error["name"])): ?>
      <p clase="text-danger"> <?php echo $error["name"]; ?> </p>
      <?php endif ?>                                    
    </div>

  <div class="form-group">
    <label for="exampleInputPassword1"><h6>Email</h6></label>
    <input type="email" class="form-control col-md-15" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="hoadoquyenpt@gmail.com" name="email" value="<?php echo $EditAdmin['email'] ; ?>">
     <?php if (isset($error["email"])): ?>
      <p clase="text-danger"> <?php echo $error["email"]; ?> </p>
      <?php endif ?>      
                           
  </div>


 <div class="form-group">
    <label for="exampleInputPassword1"><h6>Số điện thoại</h6></label>
    <input type="number" class="form-control col-md-15" id="exampleInputPassword1" placeholder="09978788888" name="phone" value="<?php echo $EditAdmin['phone'] ; ?>">   
    <?php if (isset($error["phone"])): ?>
      <p clase="text-danger"> <?php echo $error["phone"]; ?> </p>
      <?php endif ?>                     
  </div>



  <div class="form-group">
    <label for="exampleInputPassword1"><h6>Mật khấu</h6></label>
    <input type="password" class="form-control col-md-15" id="exampleInputPassword1" placeholder="********" name="password" >   
    <?php if (isset($error["password"])): ?>
      <p clase="text-danger"> <?php echo $error["password"]; ?> </p>
      <?php endif ?>                     
  </div>

    <div class="form-group">
    <label for="exampleInputPassword1"><h6>Nhập lại mật khẩu</h6></label>
    <input type="password" class="form-control col-md-15" id="exampleInputPassword1" placeholder="********" name="re_password" >   
    <?php if (isset($error["re_password"])): ?>
      <p clase="text-danger"> <?php echo $error["re_password"]; ?> </p>
      <?php endif ?>                     
  </div>

 <div class="form-group">
     <label for="exampleInputEmail1"><h6>Địa chỉ</h6></label>
    <input type="text" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Địa chỉ" name="address" value="<?php echo $EditAdmin['address'] ; ?>">
     <?php if (isset($error["address"])): ?>
      <p clase="text-danger"> <?php echo $error["address"]; ?> </p>
      <?php endif ?>                                    
    </div>
    
     <div class="form-group">
     <label for="exampleInputEmail1"><h6>Level</h6></label>
   <select class="form-control name= "level">
     <option value="1" <?php echo isset($data['level']) && $data['level']==1 ? "selected ='selected'" : ""?>>Quản lý</option>
     <option value="2" <?php echo isset($data['level']) && $data['level']==2 ? "selected ='selected'" : ""?>>Nhân viên</option>
 </select> 
     <?php if (isset($error["level"])): ?>
      <p clase="text-danger"> <?php echo $error["level"]; ?> </p>
      <?php endif ?>                                    
    </div>


 <!-- <div class="form-group">
    <label for="exampleInputEmail1"> <h6>Hình ảnh</h6> </label>
    <input type="file" class="col-sm-9 form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Hình ảnh" name="thunbar">
    </div> -->
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

  </div>
</div>

<!--  <footer class="sticky-footer">
       <div class="container my-auto">
           <div class="copyright text-center my-auto">
               <span>Copyright © Your Website 2019</span>
           </div>
       </div>
   </footer> -->
</div>
<!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->
<?php require_once __DIR__. '/../../layouts/footer.php';?>