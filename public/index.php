<?php
header("Content-Type: application/json");
require_once __DIR__ . '/../app/config/db.php';
require_once __DIR__ . '/../app/services/FaqMatcher.php';

$data = json_decode(file_get_contents('php://input'), true);
$question = $data['question'] ?? '';

$db = (new Database())->getConnection();
$stmt = $db->query("SELECT * FROM faq");
$faqs = $stmt->fetchAll(PDO::FETCH_ASSOC);

$matcher = new FaqMatcher();
$topMatches = $matcher->getTopMatches($question, $faqs, 3);

echo json_encode($topMatches);
