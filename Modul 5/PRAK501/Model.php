<?php
require_once 'Koneksi.php';

class Model {
    private $conn;

    public function __construct() {
        $database = new Koneksi();
        $this->conn = $database->getConnection();
    }

    public function insert($table, $data) {
        $columns = implode(", ", array_keys($data));
        $values  = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        $stmt = $this->conn->prepare($sql);
        foreach ($data as $key => $val) {
            $stmt->bindValue(":$key", $val);
        }
        return $stmt->execute();
    }

    public function update($table, $data, $where) {
        $columns = "";
        foreach ($data as $key => $val) {
            $columns .= "$key = :$key, ";
        }
        $columns = rtrim($columns, ", ");
        $sql = "UPDATE $table SET $columns WHERE $where";
        $stmt = $this->conn->prepare($sql);
        foreach ($data as $key => $val) {
            $stmt->bindValue(":$key", $val);
        }
        return $stmt->execute();
    }

    public function delete($table, $where) {
        $sql = "DELETE FROM $table WHERE $where";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }

    public function getData($table, $where = null) {
        $sql = "SELECT * FROM $table";
        if ($where) {
            $sql .= " WHERE $where";
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>