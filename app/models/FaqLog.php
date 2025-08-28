<?php
class FaqLog {
    private $conn;
    private $table = "faq_logs";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function save($question) {
        $query = "INSERT INTO " . $this->table . " (question) VALUES (:question)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":question", $question);
        $stmt->execute();
    }
}
