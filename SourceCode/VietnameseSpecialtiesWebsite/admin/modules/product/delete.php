<?php
require_once __DIR__ . '\..\..\autoload\autoload.php';
$open = "product";
$id = intval(getInput('id'));
$Deleteproduct = $db->fetchID('product', $id);
if (empty($Deleteproduct)) {
    $_SESSION['error'] = deletePageMessage['empty'];
    redirectAdmin("product");
}
$num = $db->delete("product", $id);
if ($num > 0) {
    $_SESSION['success'] = deletePageMessage['succes'];
    redirectAdmin("product");
} else {
    $_SESSION['error'] = deletePageMessage['error'];
    redirectAdmin("product");
}
?>