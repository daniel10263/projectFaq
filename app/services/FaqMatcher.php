<?php
class FaqMatcher {

    private function keywordScore($query, $faq) {
        $query = strtolower(trim($query));
        $text  = strtolower($faq['question'] . " " . $faq['answer'] . " " . $faq['keywords']);
        return stripos($text, $query) !== false ? 1 : 0;
    }

    private function similarityScore($a, $b) {
        similar_text(strtolower($a), strtolower($b), $percent);
        return $percent / 100;
    }

    public function getTopMatches($question, $faqs, $top = 3) {
        $results = [];

        foreach ($faqs as $faq) {
            $scoreQuestion = $this->similarityScore($question, $faq['question']);
            $scoreAnswer   = $this->similarityScore($question, $faq['answer']);
            $scoreKeyword  = $this->keywordScore($question, $faq);

            $score = max($scoreQuestion, $scoreAnswer, $scoreKeyword);

            $results[] = [
                "id" => $faq['id'],
                "question" => $faq['question'],
                "answer"   => $faq['answer'],
                "score"    => $score
            ];
        }

        usort($results, fn($a,$b) => $b['score'] <=> $a['score']);
        $best = array_slice($results, 0, $top);

        if ($best[0]['score'] < 0.1) {
            return [[
                "id" => null,
                "question" => $question,
                "answer" => "Sorry, I don’t know the answer to that. Please ask our staff directly 😊",
                "score" => 0
            ]];
        }

        return $best;
    }
}
