<?php

require_once "./app/Bank.php";
require_once "./app/ConNguoi.php";
require_once "./app/NguoiLon.php";

use App\Bank;
use App\NguoiLon;

$user1 = new Bank("Nguyễn Văn Lộc", "0123456789", 10000000);
$user1->guiTien(150000);

echo "<br />";
NguoiLon::getClass();
