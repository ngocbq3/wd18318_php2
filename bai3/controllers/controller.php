<?php

//function view dùng để render giao diện ra màn hình
//@$path: đường dẫn đến file view
//@$data: biến chứa dữ liệu
function view($path, $data = [])
{
    extract($data);
    include_once "views/$path.php";
}
