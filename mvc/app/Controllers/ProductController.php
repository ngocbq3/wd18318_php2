<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class ProductController extends BaseController
{
    //Hiển thị sản phẩm
    public function index()
    {
        $products = ProductModel::all();
        return $this->view(
            "admin/products/list",
            ['products' => $products]
        );
    }

    //Hiển thị form thêm sản phẩm
    public function create()
    {
        $categories = CategoryModel::all();
        return $this->view(
            "admin/products/add",
            ['categories' => $categories]
        );
    }
    //Lưu dữ liệu được thêm vào database
    public function store()
    {
        $data = $_POST;
        //Xử lý ảnh
        $file = $_FILES['image'];
        //Lấy tên ảnh
        $image = $file['name'];
        //Đường dẫn ảnh
        $pathImage = "images/" . $image;
        //Upload image
        move_uploaded_file($file['tmp_name'], $pathImage);
        //thêm ảnh vào data
        $data['image'] = $pathImage;
        //thêm dữ liệu vào database
        ProductModel::insert($data);
        header("location:" . ROOT_PATH . "product/list");
        die;
    }

    //Hiển thị form Edit để cập nhật
    public function edit()
    {
        $id = $_GET['id'];
        $product = ProductModel::find($id);
        $categories = CategoryModel::all();
        return $this->view(
            "admin/products/edit",
            ['product' => $product, 'categories' => $categories]
        );
    }
}
