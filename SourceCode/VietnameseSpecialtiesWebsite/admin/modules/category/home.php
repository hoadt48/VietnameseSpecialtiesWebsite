<?php
require_once __DIR__ . '\..\..\autoload\autoload.php';
$open = "category";
$id = intval(getInput('id'));
$EditCategory = $db->fetchID('category', $id);
if (empty($EditCategory)) {
    $_SESSION['error'] = $editPageMessage['empty'];
    redirectAdmin("category");
}
$home = $EditCategory['home'] == 0 ? 1 : 0;

if (empty($error)) {
    $id_update = $db->update("category", array('home' => $home), array('id' => $id));
    if ($id_update > 0) {
        $_SESSION['success'] = editPageMessage['succes'];
        redirectAdmin("category");
    } else {
        $_SESSION['error'] = editPageMessage['error'];
    }
}
?>