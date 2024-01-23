<?php

class Animal
{
    //Để thể hiện tính bao đóng chúng sẽ sử dụng các từ khóa public, protected, private
    public $tenLoai;
    public $ten;
    public $mausac;
    public $cannang;

    //Hàm khởi tạo construct
    public function __construct($tenLoai, $ten, $mausac, $cannang)
    {
        $this->tenLoai = $tenLoai;
        $this->ten = $ten;
        $this->mausac = $mausac;
        $this->cannang = $cannang;
    }
    public function an($thucan)
    {
        $this->cannang += $thucan;
    }

    public function ngu()
    {
        echo $this->ten . " đang ngủ";
    }

    public function thongtin()
    {
        echo "<p>";
        echo "$this->ten thuộc loài $this->tenLoai<br>";
        echo "Có màu sắc $this->mausac và cân năng là $this->cannang";
        echo "</p>";
    }

    //Thể hiện tính báo đóng
    protected function chay()
    {
        echo "<br /> $this->ten đang chạy";
    }
    //Tạo thuộc tính sử dụng private
    private $tinhtrang = "Đang ốm";
    public function getTinhTrang()
    {
        echo "Tình trang của $this->ten là $this->tinhtrang";
    }
}
//Tính kế thừa, tạo lớp Dog được kế thừa từ lớp Animal
class Dog extends Animal
{
    public $sochan = 4;
    public function keu()
    {
        echo "<br>$this->ten đang kêu gâu gâu";
    }
    public function getChay()
    {
        $this->chay();
    }
    public function getTinhTrang()
    {
        echo $this->tinhtrang;
    }
}

$meo = new Animal("Loài mèo", "mèo Tôm", "Xanh nhạt", 5);
$meo->thongtin();
$meo->getTinhTrang();
//Không thể gọi phương thức protected từ bên ngoài
// $meo->chay(); //sai
//Khai báo đối tượng từ lớp Dog
$cauvang = new Dog("Chó", "Cậu Vàng", "Vàng", 25);
// var_dump($cauvang);
$cauvang->thongtin();
$cauvang->keu();
//Gọi phương thức getChay
$cauvang->getChay();
// $cauvang->getTinhTrang();
