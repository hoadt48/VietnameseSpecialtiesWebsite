<?php 
    require_once __DIR__. '/autoload/autoload.php'; 
    
           $data=
                [   
                    'email'=> postInput('email'),
                    'password'=>postInput('password')
                ];
    
         $error=[];
            if($_SERVER["REQUEST_METHOD"] == "POST")
        { 
    
    
               if($data['email']=='')
             {
                $error['email']=" Email không được bỏ trống. Vui lòng nhập lại email";
             }
                if($data['password']=='')
             {
                $error['password']=" Mật khấu không được bỏ trống ";
             }
    
    
         if(empty($error)){
         	$is_check=$db->fetchOne("users","email='".$data['email']."' AND password='".md5($data['password'])."'");
    
         	if($is_check!=NULL){
    
         		$_SESSION['name_user']=$is_check['name'];
         		$_SESSION['name_id']=$is_check['id'];
         		echo "<script>alert('Đăng nhập thành công'); location.href='index.php'</script>";
    
         	}
         	else{
         		$_SESSION['error']="Đăng nhập thất bại";
         	}
    }
    
    }
    ?>

<?php require_once __DIR__. '/layouts/header.php'; ?>

<div class="col-md-9 bor">
    
    <section class="box-main1">
        <h3 class="title-main"><a href="login.php"> Đăng nhập</a> </h3>
          


		<?php if (isset($_SESSION['error'])) : ?>
			<div class="alert alert-danger">
	  			<?php echo $_SESSION['error'];unset($_SESSION['error']) ?>
			</div>
		<?php endif ?>
        <form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px">
		
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1"> Địa chỉ email</label>
			<div class="col-md-8">
				<input type="text" name="email" placeholder="hoadoquyenpt@gmail.com" class="form-control">
				<?php if (isset($error['email'])): ?>
     		 <p class="text-danger"> <?php echo $error['email'] ?> </p>
      <?php endif ?>  
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-md-offset-1"> Mật khẩu</label>
			<div class="col-md-8">
				<input type="password" name="password" placeholder="********" class="form-control">
				<?php if (isset($error['password'])): ?>
     		 <p class="text-danger"> <?php echo $error['password'] ?> </p>
      <?php endif ?> 
			</div>
		</div>
		
		<button type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 30px ">Đăng nhập</button>
	</form>
    </section>
</div>

<?php require_once __DIR__. '/layouts/footer.php'; ?>