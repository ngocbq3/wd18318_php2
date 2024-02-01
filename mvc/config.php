<?php

const ROOT_PATH = "http://localhost/wd18318_php2/mvc/";
const ROOT_URI = "/wd18318_php2/mvc/";

function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}
//hàm để điều hướng website
function redirect($route)
{
    header("location:" . ROOT_PATH . $route);
    die;
}
