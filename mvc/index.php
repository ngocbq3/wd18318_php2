<?php

use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Models\ProductModel;
use App\Router;

require_once __DIR__ . "/env.php";
require_once __DIR__ . "/config.php";

require_once __DIR__ . "/vendor/autoload.php";

$router = new Router();

Router::get("/", function () {
    echo "HOME PAGE";
});
Router::get("/home", [HomeController::class, 'index']);
Router::get("/detail", [HomeController::class, 'detail']);

Router::get("/about", function () {
    echo "ABOUT PAGE";
});
Router::get("/product/list", [ProductController::class, 'index']); //Danh sách SP
Router::get("/product/create", [ProductController::class, 'create']); //Form thêm
Router::post("/product/create", [ProductController::class, 'store']); //Thêm dữ liệu
Router::get("/product/edit", [ProductController::class, 'edit']); //Form edit
Router::post("/product/edit", [ProductController::class, 'update']); //Cập nhật
Router::get("/product/delete", [ProductController::class, 'delete']); //Xóa SP

$router->resolve();
