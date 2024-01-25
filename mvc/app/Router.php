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

        //Tìm vị trí có dấu ?
        $position = strpos($path, "?");
        //Nếu tìm thấy
        if ($position) {
            $path = substr($path, 0, $position);
        }

        $callback = false;
        if (isset(static::$routes[$method][$path])) {
            $callback = static::$routes[$method][$path];
        }
        if ($callback === false) {
            echo "404 FILE NOT FOUND";
            die;
        }
        //Nếu $callback là 1 hàm
        if (is_callable($callback)) {
            return $callback();
        }
        //Kiểm xem $callback có phải là mảng không
        if (is_array($callback)) {
            $callback[0] = new $callback[0];
            return call_user_func($callback);
        }
    }
}
