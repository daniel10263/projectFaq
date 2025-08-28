<?php
class Database {
    private $host;
    private $db_name;
    private $username;
    private $password;
    public $conn;

    public function __construct() {
        $this->host     = getenv("DB_HOST") ?: "localhost";
        $this->db_name  = getenv("DB_NAME") ?: "faqitalianrestaurant";
        $this->username = getenv("DB_USER") ?: "root";
        $this->password = getenv("DB_PASS") ?: "";
    }

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "DB error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
