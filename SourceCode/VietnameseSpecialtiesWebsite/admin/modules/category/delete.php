<?php
require_once __DIR__ . '\..\..\autoload\autoload.php';
$open = "category";
$id = intval(getInput('id'));
$DeleteCategory = $db->fetchID('category', $id);
if (empty($DeleteCategory)) {
    $_SESSION['error'] = deletePageMessage['empty'];
    redirectAdmin("category");
}
$num = $db->delete("category", $id);
if ($num > 0) {
    $_SESSION['success'] = deletePageMessage['succes'];
    redirectAdmin("category");
} else {
    $_SESSION['error'] = deletePageMessage['error'];
    redirectAdmin("category");
}
?>