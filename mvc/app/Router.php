<?php

namespace App;

class Router
{
    protected static $routes = [];

    //Phương thức get, để điều hướng webstie đến đường dẫn $path theo get
    public static function get($path, $callback)
    {
        static::$routes['get'][$path] = $callback;
    }
    //Phương thức post, để điều hướng webstie đến đường dẫn $path theo post
    public static function post($path, $callback)
    {
        static::$routes['post'][$path] = $callback;
    }
    //Phương thức getMethod để lấy phương thức theo yêu cầu
    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
    //Phương thức resolve dùng để giải quyết các routes
    public function resolve()
    {
        $method = $this->getMethod();
        $path = str_replace(ROOT_URI, "/", $_SERVER['REQUEST_URI']);
        echo $path;
    }
}
