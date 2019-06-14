<?php 
	require_once __DIR__. '/autoload/autoload.php';
    if(!isset($_SESSION['name_id']))
    {
       echo "Bạn phải đăng nhập mới mua được hàng!";
    }
    
if(getInput('id')==''){
	$_SESSION['cart']=null;
	echo(json_encode(getInput('id')));
	die();
}

  $id=intval(getInput('id'));
 //chi tiet san pham
 $product=$db->fetchID("product",$id);
	/*_debug($product);
	*/	//if 7 cart is update else add new
if( ! isset($_SESSION['cart'][$id]))
	{
	
		$_SESSION['cart'][$id]['name']=$product['name'];
		$_SESSION['cart'][$id]['thunbar']=$product['thunbar'];
		$_SESSION['cart'][$id]['quantity'] = 1;
		$_SESSION['cart'][$id]['price']=((100-$product['sale_price']) * $product['price'])/100;
	}
else
	{
		$_SESSION['cart'][$id]['quantity'] +=1;
	
	}

	echo 'Thêm sản phẩm thành công!';
?>