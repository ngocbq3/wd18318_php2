<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\CategoryModel;

class BookController extends BaseController
{
    public function index()
    {
        $books = BookModel::all();
        return $this->view(
            "list",
            ["books" => $books]
        );
    }

    public function create()
    {
        $loaisach = CategoryModel::all();
        return $this->view(
            "add",
            ['loaisach' => $loaisach]
        );
    }

    public function store()
    {
        $data = $_POST;
        //Lấy ra file
        $file = $_FILES['anh'];
        //Validate ảnh, đặt biến lưu trữ dữ liệu validate
        $errors = [];
        //Kiểm tra xem có file chưa
        if ($file['size'] === 0) {
            $errors['anh'] = "Bạn chưa nhập ảnh";
        } else {
            $imgs = ['jpg', 'png'];
            $anh = $file['name']; //lấy tên file
            //Lấy phần đuôi mở rộng của file
            $file_ext = pathinfo($anh, PATHINFO_EXTENSION);
            //Kiểm tra xem $file_ext có trong $imgs
            if (in_array($file_ext, $imgs) == false) {
                $errors['anh'] = "Bạn cần nhập file ảnh jpg, png";
            }
        }
        //Có lỗi validate
        if ($errors) {
            $loaisach = CategoryModel::all();
            return $this->view(
                "add",
                ['loaisach' => $loaisach, 'errors' => $errors, 'data' => $data]
            );
        }
        //Không có lỗi thì insert và upload ảnh
        move_uploaded_file($file['tmp_name'], "images/" . $anh);
        //thêm ảnh vào data
        $data['anh'] = $anh;
        BookModel::insert($data);
        header("location: " . ROOT_PATH);
        die;
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            BookModel::delete($id);
        }
        header("location: " . ROOT_PATH);
        die;
    }
}
