<?php
//Lấy ra danh sách sản và hiển thi danh sách sản phẩm ra view
function productIndex()
{
    $products = listProductAll();
    view("listproduct", ["products" => $products]);
}
