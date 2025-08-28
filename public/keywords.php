<?php
header("Content-Type: application/json");
require_once __DIR__ . '/../app/config/db.php';

$term = $_GET['term'] ?? '';
$term = trim($term);
if (!$term) { echo json_encode([]); exit; }

$db = (new Database())->getConnection();
$stmt = $db->prepare("SELECT DISTINCT keywords FROM faq WHERE keywords LIKE :term LIMIT 10");
$stmt->execute(['term' => "%$term%"]);

$results = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $keywords = explode(',', $row['keywords']);
    foreach ($keywords as $k) {
        $k = trim($k);
        if (stripos($k, $term) !== false && !in_array($k, $results)) {
            $results[] = $k;
        }
    }
}

echo json_encode($results);
