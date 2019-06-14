<?php
 require_once __DIR__. '/autoload/autoload.php';
 $sum=0;
/*
_debug($_SESSION['cart']);*/

 ?>
<?php require_once __DIR__. '/layouts/header.php'; ?>

<div class="col-md-9 bor">
    
    <section class="box-main1">
        <h3 class="title-main"><a href=""> Giỏ hàng của bạn</a> </h3>
     <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 80px;">STT</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 200px;">Tên sản phẩm</th>
                                          <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 180px;">Hình ảnh</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 180px;">Giá  </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 190px;">Số lượng </th>
                                     <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 300px;">Tổng tiền </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                      if(isset($_SESSION['cart'])){
                                        $stt= 1; foreach ($_SESSION['cart'] as $key=> $value): ?>
                                    
                                        <tr role="row" class="odd">
                                          <td class="sorting_1"><?php echo $stt ?></td>
                                          <td><?php echo $value['name'] ?></td>
                                           <td><img src="<?php echo uploads() ?>product/<?php echo $value['thunbar'];?>" width='150px' height='150px'></td>
                                          <td><?php echo formatPrice($value['price']) ?></td>
                                          <td>
                                            <input type="number" name="quantity" value="<?php echo $value['quantity'] ?>" class="form-control" id="qty" min="0">
                                              
                                            </td>
                                          <td><?php echo formatPrice($value['price'] * $value['quantity'] ) ?></td>
                                         <td><a href="edit.php?id=<?php echo $item['id'] ?>" class="btn btn-success">Thêm</a>
                                             <a href=""class="btn btn-success" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')">Xóa</a>
                                         </td>
                                      </tr>
                                    <?php $sum+=$value['price']* $value['quantity']; ?>
                                       <?php $_SESSION['tongtien']=$sum; ?> 
                                        <?php $stt++; endforeach;
                                      }
                                    ?>
                                </tbody>
                            </table>
		<div class="col-md-8 pull-right">
						<ul class="list-group">
						  <li class="list-group-item active"><h3>Thông tin đơn hàng</h3></li>
						  <li class="list-group-item">
						  	<span class="badge"> <?php
                    if(isset($_SESSION['tongtien'])){
                        echo formatPrice($_SESSION['tongtien']) ;
                    }else {
                      echo formatPrice(0);
                    }
                ?></span>
						  	Số tiền
						  </li>
						  <li class="list-group-item">
						 	<span class="badge"> 10%</span>
						 	VAT
						</li>
						  <li class="list-group-item">
						  	<span class="badge"> <?php
                    if(isset($_SESSION['tongtien'])){
                        $_SESSION['total']=$_SESSION['tongtien']*110/100; echo formatPrice( $_SESSION['total']) ;
                    }else {
                      echo formatPrice(0);
                    } 
                    
                ?></span>
						  	Tổng tiền thanh toán
						  </li>
						  <li class="list-group-item">
						  	<a href="index.php" class=" btn btn-success">Tiếp tục mua hàng</a>
						  	<a href="thanhtoan.php" class=" btn btn-success">Thanh toán</a>
						  </li>
						</ul>


						</div>

           </div>
           </div> 
    </section>
</div>

<?php require_once __DIR__. '/layouts/footer.php'; ?>