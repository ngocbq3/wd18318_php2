<?php
//1. Anonymouse Function
function () {
    echo "Xin chào";
};

//Gọi hàm
call_user_func(function ($name) {
    echo "Xin chào: $name";
}, "DUY");

echo "<br />";
//2. IIFE -> thực hiện lời gọi hàm luôn khi khai báo hàm
$name = "Admin";
(function ($name) {
    echo "Chào mừng <b>$name</b> đến với website";
})($name);

//3. Closure
$hello = function () {
    echo "Xin chào";
};
echo "<br />";
//Gọi hàm
$hello();

//4. Callback
function fullName($firstName, $lastName, $callback)
{
    $fname = $firstName . " " . $lastName;
    $callback($fname);
}

//Viết sãn hàm callback
function setFullName($fname)
{
    echo $fname;
}
echo "<br />";
//Gọi hàm
fullName("Lê Văn", "Hồng", function ($fname) {
    echo $fname;
});
echo "<br />";
//gọi hàm cách 2
fullName("Nguyễn Văn", "Mạnh", "setFullName");
