<?php

//mảng tuần tự
$arr = [2, 4, 3, 3, 1];
$arr2 = array(1, 4, 3, 6, 4);

//Lấy phần tử mảng
echo $arr2[3];

//mảng liên hợp có key và value
$user = [
    "id" => 1,
    "username" => "nguyenvana",
    "fullname" => "Nguyễn Văn A",
    "birthday" => "2003/12/23"
];

echo "<br>Fullname: " . $user['fullname'];

//mảng kết hợp
$sinhvien = [
    ["mssv" => "PH12345", "hoten" => "Nguyễn Văn A", "quequan" => "Hà Nội"],
    ["mssv" => "PH12346", "hoten" => "Trần Văn Đông", "quequan" => "Nam Định"],
    ["mssv" => "PH12347", "hoten" => "Lê Xuân Nghĩa", "quequan" => "Hà Nam"],
];
