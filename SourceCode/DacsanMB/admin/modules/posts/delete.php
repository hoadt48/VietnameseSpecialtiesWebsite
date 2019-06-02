<?php 

    $open ='posts';

    require_once __DIR__. '/../../autoload/autoload.php';
    $id=intval(getInput('id'));



    $DeletePosts=$db->fetchID('posts',$id);
    if(empty($DeletePosts))
    {
        $_SESSION['error']='Dữ liệu không tồn tại';
        redirectAdmin('posts');
    }

    $num= $db->delete('posts',$id);
        if($num>0)
        {
            $_SESSION['success']="Xóa thành công";
            redirectAdmin('posts');
        }
        else
        {
            $_SESSION['error']="Xóa dữ liệu thất bại";
             redirectAdmin('posts');
        }
   
//}
    
  ?>