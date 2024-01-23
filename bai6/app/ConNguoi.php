<?php

namespace App;

class ConNguoi
{

    public static function getClass()
    {
        var_dump(new self);
        echo "<br/>";
        var_dump(new static);
    }
}
