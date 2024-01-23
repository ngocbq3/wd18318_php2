<?php
//Hàm không có giá trị trả về
//Hàm không có tham số
function show()
{
    echo "Chào mừng đến với website";
}
//Gọi hàm
show();

//Hàm có tham số
function showMessage($message)
{
    echo $message;
}
echo "<br />";
//Gọi hàm
showMessage("Xin chào thế giới");

//Hàm có giá trị trả về
function sum($a, $b)
{
    return $a + $b;
}

//Hàm không biết trước số lượng tham số
//sử dụng toán tử ...rest
function sumMultiNumber(...$numbers)
{
    echo "<pre>";
    print_r($numbers);
    echo "</pre>";
    return array_sum($numbers);
}
echo "Tổng các số = " . sumMultiNumber(2, 4, 6, 3, 45, 34, 2);
