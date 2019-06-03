<?php
    require_once __DIR__. '\..\..\libraries\database.php';
    require_once __DIR__. '\..\..\libraries\function.php';
    require_once __DIR__. '\..\..\libraries\entry.php';
    define("ROOT", $_SERVER['DOCUMENT_ROOT']."/VietnameseSpecialtiesWebsite/SourceCode/VietnameseSpecialtiesWebsite/");
    $db = new Database();
    session_start();
?>