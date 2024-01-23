<?php

//Vòng lặp for
for ($i = 1; $i <= 5; $i++) {
    echo "<h3>$i. Vòng lặp for</h3>";
}
//Vòng lặp while
$dem = 1;
while ($dem <= 5) {
    echo "<h4>$dem. Vòng lặp while</h4>";
    $dem++;
}

//Vòng lặp do ..while
$dem = 1;
do {
    echo "<h4>$dem. Vòng lặp do .. while</h4>";
    $dem++;
} while ($dem <= 5);

//vòng lặp foreach
require_once "vidu2.php";

foreach ($sinhvien as $key => $sv) {
    echo "Sinh viên thứ " . ($key + 1);
    echo "<pre>";
    print_r($sv);
    echo "</pre>";
}
