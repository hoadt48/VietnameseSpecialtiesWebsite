<?php 

    $open ='users';

    require_once __DIR__. '/../../autoload/autoload.php';
    $id=intval(getInput('id'));



    $DeleteUser=$db->fetchID('users',$id);
    if(empty($DeleteUser))
    {
        $_SESSION['error']='Dữ liệu không tồn tại';
        redirectAdmin('user');
    }

    // kiểm tra danh mục có sản phẩm chưa? nếu có thì không được xóa/

    $num= $db->delete('users',$id);
        if($num>0)
        {
            $_SESSION['success']="Xóa thành công";
            redirectAdmin('user');
        }
        else
        {
            $_SESSION['error']="Xóa dữ liệu thất bại";
             redirectAdmin('user');
        }
   
//}
    
  ?>