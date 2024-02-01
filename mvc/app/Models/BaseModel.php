<?php

namespace App\Models;

use PDO;

class BaseModel
{
    protected $conn;
    protected $sqlBuilder;
    protected $tableName;

    public function __construct()
    {
        $host = HOSTNAME;
        $dbname = DBNAME;
        $username = USERNAME;
        $password = PASSWORD;

        try {
            $this->conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Lỗi kết nối CSDL: " . $e->getMessage();
        }
    }

    //function all dùng để lấy ra toàn bộ dữ liệu của bảng
    public static function all()
    {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName";
        //Chuẩn bị
        $stmt = $model->conn->prepare($model->sqlBuilder);
        //thực thi
        $stmt->execute();
        //trả lại dữ liệu cho ham
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    //method find tìm dữ liệu theo id
    public static function find($id)
    {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName WHERE id=:id";
        //Chuẩn bị
        $stmt = $model->conn->prepare($model->sqlBuilder);
        //thực thi        
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        //nếu mảng có dữ liệu
        if ($result) {
            return $result[0];
        }
        return $result;
    }
    /**
     * Method where tìm theo điều kiện
     * @column: tên cột
     * @codition: điều kiện
     * @value: giá trị
     */
    public static function where($column, $codition, $value)
    {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName WHERE `$column` $codition '$value' ";
        return $model;
    }
    public function andWhere($column, $codition, $value)
    {
        $this->sqlBuilder .= " AND `$column` $codition '$value' ";
        return $this;
    }
    public function orWhere($column, $codition, $value)
    {
        $this->sqlBuilder .= " OR `$column` $codition '$value' ";
        return $this;
    }
    //method get để thực câu lệnh SQL
    public function get()
    {
        $stmt = $this->conn->prepare($this->sqlBuilder);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    //method delete xoa dữ liệu theo id
    public static function delete($id)
    {
        $model = new static;
        $model->sqlBuilder = "DELETE FROM $model->tableName WHERE id=:id";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $stmt->execute(['id' => $id]);
    }

    /**
     * method insert: thêm dữ liệu
     * @$data: dữ liệu đầu vào, nó là mảng có key là tên cột
     */
    public static function insert($data)
    {
        $model = new static;
        $model->sqlBuilder = "INSERT INTO $model->tableName( ";
        //Biến values để lưu thông tin param cho values
        $values = " VALUES( ";
        foreach ($data as $column => $value) {
            $model->sqlBuilder .= "`{$column}`, ";
            $values .= ":$column, ";
        }
        //Xóa dấu ", " ở bên phải của chuỗi
        $model->sqlBuilder = rtrim($model->sqlBuilder, ", ");
        $values = rtrim($values, ", ");
        //Nối thêm values vào sqlBuilder
        $model->sqlBuilder .= ") " . $values . ")";

        $stmt = $model->conn->prepare($model->sqlBuilder);
        $stmt->execute($data);
        //Trả lại giá trị id mới được thêm
        return $model->conn->lastInsertId();
    }

    /**
     * method update: để cập nhật dữ liệu
     * @$id: tham số được truyền vào là id
     * @$data: dữ liệu để cập nhật là một mảng gồm có key và value, trong đó key phải là tên cột
     */
    public static function update($id, $data)
    {
        $model = new static;
        $model->sqlBuilder = "UPDATE $model->tableName SET ";
        foreach ($data as $column => $value) {
            $model->sqlBuilder .= " `{$column}`=:$column, ";
        }
        //Xóa dấu ", " ở cuối chuỗi
        $model->sqlBuilder = rtrim($model->sqlBuilder, ", ");
        //Nối với điều kiện
        $model->sqlBuilder .= " WHERE id=:id ";

        $stmt = $model->conn->prepare($model->sqlBuilder);
        //Thêm id vào mảng data
        $data['id'] = $id;
        return $stmt->execute($data);
    }
}
