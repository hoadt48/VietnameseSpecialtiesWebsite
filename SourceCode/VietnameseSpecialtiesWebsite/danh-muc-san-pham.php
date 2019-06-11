<?php
require_once __DIR__ . '\admin\autoload\autoload.php';
$cateId = intval($item['id']);
$EditCategory = $db->fetchID("category", $id);
$sql = " SELECT * FROM product WHERE category_id = $cateId ";
$ProductHome = $db->fetchsql($sql);
?>
<?php require_once __DIR__ . '\layouts\header.php'; ?>
<div class="col-md-9 bor">
    <section id="slide" class="text-center">
        <img src="images/slide/sl3.jpg" class="img-thumbnail">
    </section>

    <section class="box-main1">
        <h3 class="title-main"><a href=""> <?php echo $EditCategory['name'] ?></a> </h3>

        <div class="showitem">
            <?php foreach ($ProductHome as $item) : ?>
                <div class="col-md-3 item-product bor">
                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                        <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="180">
                    </a>
                    <div class="info-item">
                        <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                        $item['sale'],<p><strike class="sale"><?php echo formatPriceSale($item['price'], $item['sale']) ?></strike> <b class="price"><?php echo formatPrice($item['price']) ?></b></p>
                    </div>
                    <div class="hidenitem">
                        <p><a href=""><i class="fa fa-search"></i></a></p>
                        <p><a href=""><i class="fa fa-heart"></i></a></p>
                        <p><a href=""><i class="fa fa-shopping-basket"></i></a></p>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </section>

</div>
<?php require_once __DIR__ . '\layouts\footer.php'; ?>