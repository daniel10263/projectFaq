<?php
require_once __DIR__ . "/../config/db.php";
require_once __DIR__ . "/../models/Faq.php";
require_once __DIR__ . "/../models/FaqLog.php";
require_once __DIR__ . "/../services/FaqMatcher.php";

class FaqController {
    public function getAnswers($question) {
        $db = (new Database())->getConnection();
        $faqModel = new Faq($db);
        $faqLog = new FaqLog($db);
        $matcher = new FaqMatcher();

        $faqs = $faqModel->getAll();
        $matches = $matcher->getTopMatches($question, $faqs);

        // Fallback: if best score < 0.3
        if (empty($matches) || $matches[0]['score'] < 0.3) {
            // log the unanswered question
            $faqLog->save($question);

            return [[
                "id" => null,
                "question" => $question,
                "answer" => "Sorry, I don’t know the answer to that. Please ask our staff directly 😊",
                "score" => 0
            ]];
        }

        return $matches;
    }
}
