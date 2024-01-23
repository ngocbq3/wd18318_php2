<?php

//Khai báo lớp
class Tenlop
{
    //khai báo thuộc tính
    //các từ khóa có thể sử dụng public, protected, private
    public $thuoctin1;
    public $thuoctinh2;

    //Khai báo phương thức (hành động) của đối tượng
    public function hanhdong1()
    {
        echo "<h3>Đây là hành động của đối tượng</h3>";
    }
}

//Khai báo đối tượng từ 1 lớp
$doituong = new Tenlop();
//Truy cập đến thuộc tính
$doituong->thuoctin1 = "Đây là thuộc tính 1";
echo $doituong->thuoctin1;

//Truy cập đến hành động (phương thức)
$doituong->hanhdong1();
