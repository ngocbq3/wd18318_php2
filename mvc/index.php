<?php
require_once __DIR__ . "/env.php";
require_once __DIR__ . "/config.php";

require_once __DIR__ . "/vendor/autoload.php";

use App\Models\ProductModel;

// $product = ProductModel::where('name', 'LIKE', '%iphone%')
//     ->andWhere('price', '>=', 1000)
//     ->get();

// dd($product);
$data = [
    'name' => 'Iphone 20',
    'price' => 2500,
    'detail' => '1 Quả thận',
    'image' => "iphone20.jpg"
];
// dd(ProductModel::insert($data));
dd(ProductModel::update(168, $data));
