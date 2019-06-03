<?php
require_once __DIR__ . '\..\..\autoload\autoload.php';
$open = "users";
$id = intval(getInput('id'));
$Deleteusers = $db->fetchID('users', $id);
if (empty($Deleteusers)) {
    $_SESSION['error'] = deletePageMessage['empty'];
    redirectAdmin("users");
}
$num = $db->delete("users", $id);
if ($num > 0) {
    $_SESSION['success'] = deletePageMessage['succes'];
    redirectAdmin("users");
} else {
    $_SESSION['error'] = deletePageMessage['error'];
    redirectAdmin("users");
}
?>