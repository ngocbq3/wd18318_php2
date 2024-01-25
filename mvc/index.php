<?php

use App\Controllers\HomeController;
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
Router::get("/product/create", function () {
    echo "PRODUCT CREATE PAGE";
});
Router::post("/product/create", function () {
    echo "PRODUCT CREATE PAGE";
});


$router->resolve();
