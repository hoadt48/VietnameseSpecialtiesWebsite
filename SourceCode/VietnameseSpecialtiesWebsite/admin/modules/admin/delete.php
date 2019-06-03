<?php
require_once __DIR__ . '\..\..\autoload\autoload.php';
$open = "admin";
$id = intval(getInput('id'));
$Deleteadmin = $db->fetchID('admin', $id);
if (empty($Deleteadmin)) {
    $_SESSION['error'] = deletePageMessage['empty'];
    redirectAdmin("admin");
}
$num = $db->delete("admin", $id);
if ($num > 0) {
    $_SESSION['success'] = deletePageMessage['succes'];
    redirectAdmin("admin");
} else {
    $_SESSION['error'] = deletePageMessage['error'];
    redirectAdmin("admin");
}
?>