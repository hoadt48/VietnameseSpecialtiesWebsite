<?php 

    $open ='product';

    require_once __DIR__. '/../../autoload/autoload.php';
    $id=intval(getInput('id'));


    $EditProduct=$db->fetchID('product',$id);
    if(empty($EditProduct))
    {
        $_SESSION['error']='Dữ liệu không tồn vui lòng chọn lại dữ liệu cần sửa';
        redirectAdmin('product');
    }
  $category=$db->fetchAll("category");


        if($_SERVER["REQUEST_METHOD"] == "POST")
    { 
            $data=
            [
                 'category_id'=> postInput('category_id'),  
                'name'=> postInput('name'),        
                'price'=> postInput('price'),
                'quantity'=> postInput('quantity'),
                'thunbar'=> $EditProduct['thunbar'],  
                'content'=> postInput('content'),
                'sale_price'=>postInput('sale_price')
              
            ];
         $error=[];
        
         if(postInput('name')=='')
         {
            $error['name']=" Vui lòng nhập lại tên danh mục";
         }

         if(postInput('category_id')=='')
         {
            $error['category_id']=" Vui lòng chọn lại tên danh mục";
         }

           if(postInput('price')=='')
         {
            $error['price']=" Vui lòng nhập lại giá sản phẩm ";
         }
            if(postInput('quantity')=='')
         {
            $error['quantity']=" Vui lòng nhập lại số lượng sản phẩm ";
         }
       
           if(postInput('content')=='')
         {
            $error['content']=" Vui lòng nhập lại nội dung sản phẩm";
          }

         // _debug($data);die();

         //nếu loi trong insert dư  lieu vao
         if(empty($error)){
          $isChangeThunbar;
          //lấy tên file bao gồm 
           if(isset($_FILES['thunbar'])&&$_FILES['thunbar']['name']!=''){
                $file_name=$_FILES['thunbar']['name'];
                $fileTransfomation['fileName']=$file_name;
                $fileTransfomation['from']=$_FILES['thunbar']['tmp_name'];//đường dẫn đến file upload ở client;
                $file_type=$_FILES['thunbar']['type'];// kiểu file mà bạn upload(hình ảnh, word..)
                $file_error=$_FILES['thunbar']['error'];// trang thái của file upload, 0 => không có lỗi
                if($file_error==0)
                {
                  $fileTransfomation['to'] = ROOT.'product/';
                  $data['thunbar']=$file_name;

                }
                $isChangeThunbar=true;
              }
              else {
                {
                  $isChangeThunbar=false;
                }
              }
            $id_update = $db->update('product', $data,array('id'=>$id));
           //_debug($id_update);die();
            
            //nếu có dữ liệu thông báo thành công nếu k thì trả về thông báo thất bại!
           if($id_update > 0)
           {
                 if($isChangeThunbar==true&&$id_update>0)
                  {
                    move_uploaded_file($fileTransfomation['from'],$fileTransfomation['to'].$file_name);
                  }
                 $_SESSION['success']="Sửa thành công";
                 redirectAdmin('product');
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
        <h1>Sửa sản phẩm</h1>
        <hr>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="index.html">Sản phẩm</a>
            </li>
            <li class="breadcrumb-item active">Thêm mới</li>
        </ol>
    

    
<div class="row">
  <div class="col-md-5">
    <form method="POST" enctype ="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1"><h6>Danh mục đặc sản theo các tỉnh</h6></label>
      <div class="col-sm-50">
        <select class= "form-control col-md-15" name="category_id" >
          <option value="">- Hãy chọn danh mục sản phẩm -</option>
        <?php foreach ($category as $item): ?>
          <option value="<?php echo $item['id']?>" <?php echo $EditProduct['category_id']==$item['id']? "selected ='selected'": '' ?>> <?php echo $item['name'] ?></option>
          
        <?php endforeach ?>
        </select>
      </div>
     <?php if (isset($error["category_id"])): ?>
      <p clase="text-danger"> <?php echo $error["category_id"]; ?> </p>
      <?php endif ?>      
    </div>

  <div class="form-group">
     <label for="exampleInputEmail1"><h6>Tên sản phẩm </h6></label>
    <input type="text" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên sản phẩm" name="name" value="<?php echo $EditProduct['name'] ; ?>">
     <?php if (isset($error["name"])): ?>
      <p clase="text-danger"> <?php echo $error["name"]; ?> </p>
      <?php endif ?>                         
                          
    </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><h6>Giá sản phẩm</h6></label>
    <input type="number" class="form-control col-md-15" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Giá" name="price" min="0"> value="<?php echo $EditProduct['price'] ; ?>">
     <?php if (isset($error["price"])): ?>
      <p clase="text-danger "> <?php echo $error["price"]; ?> </p>
      <?php endif ?>      
                           
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1"><h6>Giảm giá sản phẩm</h6></label>
    <input type="number" class="form-control col-md-15" id="sale" placeholder="10%"  min="0" name="sale_price" value="<?php echo $EditProduct['sale_price'] ; ?>">   
     <?php if (isset($error["sale_price"])): ?>
      <p clase="text-danger"> <?php echo $error["sale_price"]; ?> </p>
      <?php endif ?>                      
  </div>

<div class="form-group">
    <label for="exampleInputPassword1"><h6>Số lượng</h6></label>
    <input type="number" class="form-control col-md-15" id="exampleInputPassword1" placeholder="0" name="quantity" value="<?php echo $EditProduct['quantity'] ; ?>">   
     <?php if (isset($error["quantity"])): ?>
      <p clase="text-danger"> <?php echo $error["quantity"]; ?> </p>
      <?php endif ?>                      
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><h6>Hình ảnh</h6></label>
    <input type="file" class="form-control col-md-15" id="thunbar" onchange="preview_image(event)" placeholder="hình ảnh" name="thunbar">  
     <img id="output_image" src="<?php echo uploads() ?>product/<?php echo $EditProduct['thunbar'];?>">
    <?php if (isset($error["unit"])): ?>
      <p clase="text-danger"> <?php echo $error["unit"]; ?> </p>
      <?php endif ?>                     
  </div>

 <div class="form-group">
    <label for="exampleInputEmail1"><h6>Nội dung </h6></label>
     <textarea type="text" name="content" class="form-control " cols="exampleInputEmail1" rows="4" placeholder="nội dung" name="content" ><?php echo $EditProduct['content'] ; ?></textarea>
     <?php if (isset($error["content"])): ?>
    <p clase="text-danger"> <?php echo $error["content"]; ?> </p>
    <?php endif ?>     
  </div> 
                    </div>

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
<script type='text/javascript'>
  function preview_image(event) 
  {
     var reader = new FileReader();
     reader.onload = function()
     {
      var output = document.getElementById('output_image');
      output.src = reader.result;
     }
     reader.readAsDataURL(event.target.files[0]);
  }
</script>
<?php require_once __DIR__. '/../../layouts/footer.php';?>