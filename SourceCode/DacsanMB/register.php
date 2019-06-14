<?php 
  $open ='users';
	require_once __DIR__. '/autoload/autoload.php';
    if(isset($_SESSION['name_id']))
    {
       echo "<script>alert('Bạn đã có tài khoản nên không cần đăng ký nữa!'); location.href='index.php'</script>";
    }

            $data=

            [    
                'name'=> postInput('name'),        
                'email'=> postInput('email'),
                'phone'=> postInput('phone'),
                'password'=>postInput('password'),  
                'address'=> postInput('address')
                
            ];

        $error=[];
        
        if($_SERVER["REQUEST_METHOD"] == "POST")
    { 

 

         if($data['name']=='')
         {
            $error['name']=" Tên không được bỏ trống";
         }

           if($data['email']=='')
         {
            $error['email']=" Email không được bỏ trống. Vui lòng nhập lại email";
         }
          else {
            $is_email= $db->fetchOne("users"," email= '".$data['email']."' ");
            if($is_email!=NULL)
            {
               $error['email']="Email đã tồn tại. Vui lòng nhập email khác!";
            }
          }

            if($data['phone']=='')
         {
            $error['phone']=" Số điện thoại không được bỏ trống ";
         }
            if($data['password']=='')
         {
            $error['password']=" Mật khấu không được bỏ trống ";
         }
         else {
         	$data['password']=MD5(postInput('password'));
         }

           if($data['address']=='')
         {
            $error['address']=" Địa chỉ không được bỏ trống";
         }

       

         //nếu loi trong co nghinsert dư  lieu vao
         if(empty($error)){

            $id_insert=$db->insert('users',$data);
        
            if($id_insert>0){
            	$_SESSION['success']=" Đăng ký thành công. Mời bạn đăng nhập!";
              	header("location: login.php");
             }
            else {
             /* $_SESSION['error']=*/echo "Thêm mới thất bại";
            }
         }

	}
	

 ?>
<?php require_once __DIR__. '/layouts/header.php'; ?>

<div class="col-md-9 bor">
    
    <section class="box-main1">
        <h3 class="title-main"><a href=""> Đăng ký thành viên</a> </h3>
		<form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px">
		<div class="form-group">
			<label class="col-md-3 control-label"> Tên thành viên</label>
			<div class="col-md-8">
				<input type="text" name="name" placeholder="Đỗ Thị Hoa" class="form-control" >
				<?php if (isset($error['name'])): ?>
     		 <p class="text-danger"> <?php echo $error['name'] ?> </p>
      <?php endif ?>   
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1"> Địa chỉ email</label>
			<div class="col-md-8">
				<input type="text" name="email" placeholder="hoadoquyenpt@gmail.com" class="form-control" >
				<?php if (isset($error['email'])): ?>
     		 <p class="text-danger"> <?php echo $error['email'] ?> </p>
      <?php endif ?>  
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1"> Mật khẩu</label>
			<div class="col-md-8">
				<input type="password" name="password" placeholder="********" class="form-control" >
				<?php if (isset($error['password'])): ?>
     		 <p class="text-danger"> <?php echo $error['password'] ?> </p>
      <?php endif ?>  
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1"> Số điện thoại</label>
			<div class="col-md-8">
				<input type="number" name="phone" placeholder="0964499835" class="form-control">
				<?php if (isset($error['phone'])): ?>
     		 <p class="text-danger"> <?php echo $error['phone'] ?> </p>
      <?php endif ?>  
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1"> Địa chỉ</label>
			<div class="col-md-8">
				<input type="text" name="address" placeholder="Phú Thọ" class="form-control" >
				<?php if (isset($error['address'])): ?>
     		 <p class="text-danger"> <?php echo $error['address'] ?> </p>
      <?php endif ?>  
			</div>
		</div>
	
	
		<button type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 30px ">Đăng ký</button>
	</form>

        
    </section>
</div>

<?php require_once __DIR__. '/layouts/footer.php'; ?>