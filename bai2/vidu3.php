<?php
$host = "127.0.0.1"; //localhost
$dbname = "we3014.01";
$username = "root";
$password = "";

try {
    //Chuỗi kết nối đến DB
    $conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Lỗi kết nối CSDL: " . $e->getMessage();
}

//Thêm dữ liệu sử dụng tham số trong câu lệnh SQL
//SQL INSERT
$sql = "INSERT INTO products(name, image, cate_id, price) VALUES(:name, :image, :cate_id, :price)";
//2. Chuẩn bị
$stmt = $conn->prepare($sql);
//3. Lấy dữ liệu để thêm
$data = [
    "name" => "Test 2",
    "image" => "test2.jpg",
    "cate_id" => 4,
    "price" => 199
];
//4. Thực thi
$stmt->execute($data);


//lấy dữ liệu
//1. SQL select
$sql = "SELECT * FROM products";
//2. Chuẩn bị
$stmt = $conn->prepare($sql);
//3. Thực thi
$stmt->execute();
//4. Lấy dữ liệu
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($result);
echo "</pre>";
