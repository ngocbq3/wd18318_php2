<?php

abstract class BankAbstract
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

    public abstract function chuyentien($sotien, $nguoiNhan);
}

class HDbank extends BankAbstract
{
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
}


$user1 = new HDbank("Nguyễn Văn Dũng", "0123123123", 10000000);
$user2 = new HDbank("Nông văn Dền", "0912120999", 0);

$user1->chuyentien(500000, $user2);
