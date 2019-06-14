<?php 

require_once __DIR__. '/autoload/autoload.php';
/*unset($_SESSION['cart']);*/

$sqlHomecategory = "SELECT name,id FROM category WHERE home = 1  ORDER BY updated_at";
$CategoryHome=$db->fetchsql($sqlHomecategory);
 
 $data=[];
 foreach ($CategoryHome as $item) {

$CateId=intval($item['id']);

 $sql = "SELECT * FROM product WHERE category_id= $CateId";
 $ProductHome=$db->fetchsql($sql);
 $data[$item['name']]=$ProductHome;
    
}
 /*_debug( $data); */
 ?>
<?php require_once __DIR__. '/layouts/header.php'; ?>

<div class="col-md-9 bor">
    <section id="slide" class="text-center" >
        <img src="<?php echo base_url() ?>public/frontend/images/slide/trangchu.png" class="img-thumbnail">
    </section>
    <section class="box-main1">
  <?php foreach ($data as $key => $value) : ?>
     <h3 class="title-main"><a href=""> <?php echo $key ?></a> </h3>
       <div class="row">
           <div class = "col-12">
                <div class="showitem">
            <?php foreach ($value as $item) :?>
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
                    <p><i onclick="addToCart(<?php echo $item['id']?>)" class="fa fa-shopping-basket"></i></p>
                </div>
            </div>
           <?php endforeach ?>
        </div>
           </div>
       </div>
<?php endforeach ?>
    </section>
</div>

<script>
  function addToCart(idProduct){
    $.ajax({
          method: "GET",
          url: "themcart.php?%20id="+idProduct,
          success: function(result){
            alert(result.trim());
          }
      })
  }
</script>

<?php require_once __DIR__. '/layouts/footer.php'; ?>