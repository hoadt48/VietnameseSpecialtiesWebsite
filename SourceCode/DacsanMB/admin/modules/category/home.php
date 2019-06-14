<?php 

 $open ='category';

    require_once __DIR__. '/../../autoload/autoload.php';
    $id=intval(getInput('id'));

    $EditCategory=$db->fetchID('category',$id);
       
       if(empty($EditCategory))
    {
        $_SESSION['error']='Dữ liệu không tồn vui lòng chọn lại dữ liệu cần sửa';
        redirectAdmin('category');
    }

 /* viet tat    $home= $EditCategory['home']==0 ? 1 : 0 ;*/

			if($EditCategory['home']==0){
				$home=1;
			}
			else {
				$home=0;
			}

$update = $db->update('category', array('home'=>$home),array('id'=>$id));
            //nếu có dữ liệu thông báo thành công nếu k thì trả về thông báo thất bại!
	
           if($update > 0)
           {
                 $_SESSION['success']="Sửa thành công";
                 redirectAdmin('category');
           }

           else{
              $_SESSION['error']="Sửa dữ liệu thất bại";
           }

 ?>