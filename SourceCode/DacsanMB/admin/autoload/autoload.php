<?php
	session_start();
    require_once __DIR__. '/../../libraries/database.php';
    require_once __DIR__. '/../../libraries/function.php';
    $db = new Database();
   /* session_start();*/

   define("ROOT",$_SERVER['DOCUMENT_ROOT']."/dacsanmb/public/uploads/");
?>