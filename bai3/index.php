<?php
require_once "models/db.php";
require_once "models/productModel.php";
require_once "controllers/controller.php";
require_once "controllers/productController.php";

$ctl = $_GET['ctl'] ?? "";

switch ($ctl) {
    case "":
    case "home":
        echo "<h1>Trang chủ</h1>";
        break;
    case "contact":
        echo "<h1>Liên hệ</h1>";
        break;
    case "about":
        echo "<h1>Trang giới thiệu</h1>";
        break;
    case "product":
        productIndex();
        break;
    default:
        echo "<h1>404 FILE NOT FOUND</h1>";
}
