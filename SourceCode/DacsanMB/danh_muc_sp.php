<?php 
require_once __DIR__. '/autoload/autoload.php'; 
    $id=intval(getInput('id'));
    $EditCategory=$db->fetchID("category",$id);

   
    if(isset($_GET['p'])){
            $p=$_GET['p'];
    }
    else {
        $p=1;
    }
     $sql="SELECT * FROM product WHERE category_id = $id";
     $total= count($db->fetchsql($sql));

    $product=$db->fetchJones("product",$sql,$total,$p,2,true);
    $sotrang=$product['page'];//lay so trang 
    unset($product['page']);//huy so trang
    //*/_debug($product);
    $path= $_SERVER["SCRIPT_NAME"];// chir vao trang hien tai
    ?>
    <?php require_once __DIR__. '/layouts/header.php'; ?>

        <div class="col-md-9 bor">

            <section class="box-main1">
                <h3 class="title-main"><a href=""> <?php echo $EditCategory['name'] ?></a> </h3>
                <!--  noidung -->
                <div class="showitem clearfix" >
                    <?php foreach ($product as $item): ?>
                <div class="col-md-3 item-product bor">
                     <a href="chi_tiet_sp.php? id=<?php echo $item['id']?>">
                <img src="<?php echo uploads()?>/product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="180">
                </a>
                <div class="info-item">
                  <p> <a href="chi_tiet_sp.php?id=<?php echo $item['id']?>"><?php echo $item['name'] ?></a></p>
                     <?php if($item['sale_price']>0) : ?>

                                    <li><p><strike class="sale"><?php echo formatPrice($item['price']) ?></strike> <b class="price"><?php echo formatpricesale($item['price'],$item['sale_price']) ?></b></li>

                                    <?php else : ?>
                                        <li><p><?php echo formatPrice($item['price']) ?></p></li>
                                    <?php endif; ?>
               
                </div>
                <div class="hidenitem">
                    <p><a href="chi_tiet_sp.php? id=<?php echo $item['id']?>"><i class="fa fa-search"></i></a></p>
                    <p><a href=""><i class="fa fa-heart"></i></a></p>
                    <p><a href=""><i class="fa fa-shopping-basket"></i></a></p>
                </div>
            </div>
                <?php endforeach ?> 
                 </div>    
                 <nav class="text-center">
                    <ul class="pagination">
                        <?php for($i=1;$i<=$sotrang;$i++): ?>
                      <li class="<?php echo isset($_GET['p']) && $_GET['p']==$i ? 'active': '' ?>"><a href="<?php echo $path ?>?id=<?php echo $id ?>&&p=<?php echo $i?>"><?php echo $i?></a></li>
                      <?php endfor; ?>
                    </ul>  
                 </nav>
            </section>
            </div>

            <?php require_once __DIR__. '/layouts/footer.php'; ?>