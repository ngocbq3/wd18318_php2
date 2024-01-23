<?php

//biến hằng
const PI = 3.14;
define("HELLO", "Xin chào thế giới");

echo "PI: " . PI;
echo "<br>";
echo HELLO;

//Biến toàn cục
$fullname = "Nguyễn Văn A";
function show()
{
    global $fullname;
    echo "<h2>Xin chào $fullname</h2>";
}
show();
