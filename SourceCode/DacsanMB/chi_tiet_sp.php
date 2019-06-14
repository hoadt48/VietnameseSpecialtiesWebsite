<?php 
require_once __DIR__. '/autoload/autoload.php';
 $id=intval(getInput('id'));
 //chi tiet san pham
 $Product=$db->fetchID("product",$id);
 //lay danh mục san pham
 $cateid=intval($Product['category_id']);
 $sql="SELECT * FROM product WHERE category_id=$cateid ORDER BY ID DESC LIMIT 4";
 $sanphamkemtheo=$db->fetchsql($sql);
/* _debug($sanphamkemtheo);*/

 ?>
<?php require_once __DIR__. '/layouts/header.php'; ?>

<div class="col-md-9 bor">
    
  
                        <section class="box-main1" >
                            <div class="col-md-6 text-center">
                                <img src="<?php echo uploads()?>product/<?php echo $Product['thunbar'] ?>" class="img-responsive bor" id="imgmain" width="100%" height="370" data-zoom-image="images/16-270x270.png">
                                                                  
                                </ul>
                            </div>
                            <div class="col-md-6 bor" style="margin-top: 20px;padding: 30px;">
                               <ul id="right">
                                   <h3><?php echo $Product['name'] ?> </h3>
                                    <?php if($Product['sale_price']>0) : ?>

                                    <li><p><strike class="sale"><?php echo formatPrice($Product['price']) ?></strike> <b class="price"><?php echo formatpricesale($Product['price'],$Product['sale_price']) ?></b></li>

                                    <?php else : ?>
                                    	<li><p><?php echo formatPrice($Product['price']) ?></p></li>
									<?php endif; ?>
                                    <li><a href="themcart.php" class="btn btn-default"> <i class="fa fa-shopping-basket"></i>Add TO Cart</a></li>
                               </ul>
                            </div>

                        </section>
                        <div class="col-md-12" id="tabdetail">
                            <div class="row">
                                    
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home">Mô tả sản phẩm </a></li>
                                    <li><a data-toggle="tab" href="#menu1">Thông tin khác </a></li>
                                                                    </ul>
                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active" >
                                        <p><?php echo $Product['content'] ?></p>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                        	 <div class="showitem">
            <?php foreach ($sanphamkemtheo as $item) :?>
            <div class="col-md-3 item-product bor">
                <a href="chi_tiet_sp.php? id=<?php echo $item['id']?>">
                <img src="<?php echo uploads()?>/product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="180">
                </a>
                <div class="info-item">
                    <a href="chi_tiet_sp.php?id=<?php echo $item['id']?>"><?php echo $item['name'] ?></a>
                    <p><strike class="sale"><?php echo formatPrice($item['price']) ?></strike> <b class="price"><?php echo formatpricesale($item['price'],$item['sale_price']) ?></b></p>
               
                </div>
                <div class="hidenitem">
                    <p><a href="chi_tiet_sp.php? id=<?php echo $item['id']?>"><i class="fa fa-search"></i></a></p>
                    <p><a href=""><i class="fa fa-heart"></i></a></p>
                    <p><a href=""><i class="fa fa-shopping-basket"></i></a></p>
                </div>
            </div>
           <?php endforeach ?>
        </div>

                        </div>

</div>

<?php require_once __DIR__. '/layouts/footer.php'; ?>