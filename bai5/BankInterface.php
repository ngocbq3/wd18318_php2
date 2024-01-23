<?php

interface BankInterface
{
    public function rutTien($sotien);
    public function chuyenTien($sotien, $nguoiNhan);
}
interface Test
{
    public function guiTien($sotien);
}

class HKBank implements BankInterface, Test
{
    public $hoten;
    public $soTk;
    public $soDu;

    public function __construct($hoten, $soTk, $soDu)
    {
        $this->hoten = $hoten;
        $this->soTk = $soTk;
        $this->soDu = $soDu;
    }

    public function rutTien($sotien)
    {
        if ($sotien < $this->soDu) {
            $this->soDu -= $sotien;
            echo "<br>$this->hoten vừa thực hiện lệnh rút tiền thành công.";
            echo "<br>Số dư trong tài khoản là: $this->soDu";
        }
    }
    public function chuyentien($sotien, $nguoiNhan)
    {
        if ($sotien < $this->soDu) {
            $this->soDu -= $sotien;
            $nguoiNhan->soDu += $sotien;
            echo "<hr />";
            echo "$this->hoten vừa chuyển tiền thành công cho $nguoiNhan->hoten số tiên $sotien<br>";
            echo "Số dư tài khoản là: $this->soDu";
        } else {
            echo "Số dư tài khoản không đủ";
        }
    }
    public function guiTien($sotien)
    {
        $this->soDu += $sotien;
        echo "<hr />";
        echo "Tài khoản của bạn vửa được cộng thêm $sotien<br />";
        echo "So dư tài khoản là: " . $this->soDu;
    }
}

$user1 = new HKbank("Nguyễn Văn Dũng", "0123123123", 10000000);
$user2 = new HKbank("Nông văn Dền", "0912120999", 0);

$user1->chuyentien(500000, $user2);
$user1->guiTien(1000000);
