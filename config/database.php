<?php
class Database
{
    private $host = "localhost";
    private $db_name = "my_db";
    private $username = "root";
    private $password = "";
    public $conn;


    public function getConnection()
    {
        var_dump('lol');
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }


    public function executeQuery($query, $params = [])
    {
        $stmt = $this->conn->prepare($query);

        foreach ($params as $key => &$val) {
            $stmt->bindParam($key, $val);
        }

        if ($stmt->execute()) {
            return $stmt;
        } else {
            return false;
        }
    }


    public function fetchAll($query, $params = [])
    {
        $stmt = $this->executeQuery($query, $params);

        if ($stmt) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }


    public function fetch($query, $params = [])
    {
        $stmt = $this->executeQuery($query, $params);

        if ($stmt) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }
}
?>