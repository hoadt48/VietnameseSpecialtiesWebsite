<?php 

    $open ='category';

   require_once __DIR__. '/../../autoload/autoload.php';
   $category=$db->fetchAll("category");
    $open = "product";
        if($_SERVER["REQUEST_METHOD"] == "POST")
    { 
            $data=

            [   'category_id'=> postInput('category_id'),  
                'name'=> postInput('name'),        
                'price'=> postInput('price'),
                'quantity'=> postInput('quantity'),
                'content'=> postInput('content'),
                'sale_price'=>postInput('sale_price')
               /* 'thunbar'=>*/
                          
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

          if(!isset($_FILES['thunbar'])){
              $error['thunbar']= "Vui lòng chọn hình ảnh";
            }
         //$error['thunbar']=$_FILES['thunbar'];
//_debug(empty($error));die();
         //nếu loi trong co nghinsert dư  lieu vao
         if(empty($error)){
           
          //lấy tên file bao gồm 
            if(isset($_FILES['thunbar'])){
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
            }
            $id_insert=$db->insert('product',$data);
        
            if($id_insert>0){
             move_uploaded_file($fileTransfomation['from'],$fileTransfomation['to'].$file_name);
              $_SESSION['success']= "Thêm mới thành công";
              redirectAdmin('product');
            }
            else {
              $_SESSION['error']="Thêm mới thất bại";
            }
        }
        else {
              $_SESSION['error']="Thêm mới thất bại";
            }
          }
    ?>
<?php require_once __DIR__. '/../../layouts/header.php';?>
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Page Content -->
        <h1>Thêm mới sản phẩm</h1>
        <hr>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo admin_page() ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?php echo modules("product") ?>">Sản phẩm</a>
            </li>
            <li class="breadcrumb-item active">Thêm mới</li>

          </ol>


<div class="row">
  <div class="col-md-5">
    <form method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1"><h6>Danh mục đặc sản theo các tỉnh</h6></label>
      <div class="col-sm-50">
        <select class= "form-control col-md-15" name="category_id" >
          <option value="">- Hãy chọn danh mục sản phẩm -</option>
        <?php foreach ($category as $item): ?>
          <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
        <?php endforeach ?>
        </select>
      </div>
     <?php if (isset($error["category_id"])): ?>
      <p clase="text-danger"> <?php echo $error["category_id"]; ?> </p>
      <?php endif ?>      
    </div>

  <div class="form-group">
     <label for="exampleInputEmail1"><h6>Tên sản phẩm </h6></label>
    <input type="text" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên sản phẩm" name="name">
     <?php if (isset($error["name"])): ?>
      <p clase="text-danger"> <?php echo $error["name"]; ?> </p>
      <?php endif ?>                         
                          
    </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><h6>Giá sản phẩm</h6></label>
    <input type="number" class="form-control col-md-15" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Giá" name="price" min="0">
     <?php if (isset($error["price"])): ?>
      <p clase="text-danger color='F9900'"> <?php echo $error["price"]; ?> </p>
      <?php endif ?>                         
  </div>

<div class="form-group">
    <label for="saleName"><h6>Giảm giá sản phẩm</h6></label>
    <input type="number" class="form-control col-md-15" id="saleName" aria-describedby="emailHelp" placeholder="10%" name="sale_price" value="0" min="0">
     <!-- <?php if (isset($error["sale_price"])): ?>
                              <p clase="text-danger color='F9900'"> <?php echo $error["sale_price"]; ?> </p>
                              <?php endif ?>  -->                        
  </div>

 <div class="form-group">
    <label for="exampleInputPassword1"><h6>Số lượng</h6></label>
    <input type="number" class="form-control col-md-15" id="exampleInputPassword1" placeholder="10" name="quantity" min="0">   
     <?php if (isset($error["quantity"])): ?>
      <p clase="text-danger"> <?php echo $error["quantity"]; ?> </p>
      <?php endif ?>                      
  </div>

   <div class="form-group">
    <label for="exampleInputEmail1"> <h6>Hình ảnh</h6> </label>
    <input type="file" onchange="preview_image(event)" class="col-sm-9 form-control" id="thunbar" placeholder="Hình ảnh" name="thunbar"/>
    <input type="hidden" name="img" id="img" />
    <img id="output_image">
    <?php if (isset($error["thunbar"])): ?>
    <p clase="text-danger"> <?php echo $error["thunbar"]; ?> </p>
    <?php endif ?> 
    </div>
 <!--  <div class="form-group">
   <label for="exampleInputPassword1"><h6>Đơn vị</h6></label>
   <input type="text" class="form-control col-md-15" id="exampleInputPassword1" placeholder="10%" name="unit">   
   <?php if (isset($error["unit"])): ?>
     <p clase="text-danger"> <?php echo $error["unit"]; ?> </p>
     <?php endif ?>                     
 </div> -->

 <div class="form-group">
    <label for="exampleInputEmail1"><h6>Nội dung </h6></label>
     <textarea type="text" id="content" class="form-control "  cols="exampleInputEmail1" rows="4" placeholder="nội dung" name="content"></textarea>
     <?php if (isset($error["content"])): ?>
    <p clase="text-danger"> <?php echo $error["content"]; ?> </p>
    <?php endif ?>     
  </div>



  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

  </div>
</div>

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
<!-- /#wrapper -->
<?php require_once __DIR__. '/../../layouts/footer.php';?>
