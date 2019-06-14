<?php 

session_start();
   require_once __DIR__. '/../libraries/database.php';
  require_once __DIR__. '/../libraries/function.php';
   $db = new Database;


$category=$db->fetchAll("category");

$sqlptnew = "SELECT * FROM product WHERE 1 ORDER BY id DESC LIMIT 3";
$productNew=$db->fetchsql($sqlptnew);

define("ROOT",$_SERVER['DOCUMENT_ROOT']."/dacsanmb/public/uploads/");

 ?>