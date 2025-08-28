<?php

/**Accepts a search query via a GET parameter (q).
Connects to a MySQL database (faqitalianrestaurant) and fetches all FAQs.
Uses a bag-of-words model and cosine similarity to rank FAQs based on how closely the query matches their questions and keywords.
Returns the top 3 matching FAQs as JSON. */
header('Content-Type: application/json');

// Database connection
$pdo = new PDO("mysql:host=localhost;dbname=faqitalianrestaurant;charset=utf8", "root", "");

// Get query from GET parameter
$q = isset($_GET['q']) ? trim($_GET['q']) : '';
if (!$q) {
    echo json_encode([]);
    exit;
}

// Fetch all FAQs
$stmt = $pdo->query("SELECT id, question, answer, keywords FROM faq");
$faqs = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Bag-of-words vector
function bagOfWords($text) {
    $words = preg_split('/\W+/u', strtolower($text), -1, PREG_SPLIT_NO_EMPTY);
    $vec = [];
    foreach ($words as $w) $vec[$w] = ($vec[$w] ?? 0) + 1;
    return $vec;
}

// Cosine similarity
function cosineSimilarity($vecA, $vecB) {
    $dot = 0; $normA = 0; $normB = 0;
    foreach ($vecA as $key => $valA) {
        $valB = $vecB[$key] ?? 0;
        $dot += $valA * $valB;
        $normA += $valA * $valA;
    }
    foreach ($vecB as $valB) $normB += $valB * $valB;
    return ($normA && $normB) ? ($dot / (sqrt($normA) * sqrt($normB))) : 0;
}

// Prepare query vector
$qVec = bagOfWords($q);

$results = [];
foreach ($faqs as $faq) {
    // Combine question + keywords for better matching
    $text = $faq['question'] . ' ' . $faq['keywords'];
    $faqVec = bagOfWords($text);
    
    // Cosine similarity
    $score = cosineSimilarity($qVec, $faqVec);
    
    // Optional: Levenshtein/fuzzy (uncomment to use instead)
    // $score = 1 - (levenshtein(strtolower($q), strtolower($faq['question'])) / max(strlen($q), strlen($faq['question'])));
    
    $results[] = ['faq' => $faq, 'score' => $score];
}

// Sort and get top 3
usort($results, fn($a,$b) => $b['score'] <=> $a['score']);
$top3 = array_slice($results, 0, 3);

echo json_encode(array_map(fn($r)=> $r['faq'], $top3));
