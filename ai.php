<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

header("Content-Type: application/json");

$raw = file_get_contents("php://input");
$data = json_decode($raw, true);

if(!$data || !isset($data["message"])){
    echo json_encode([
        "choices" => [
            ["message" => ["content" => "⚠️ No message received."]]
        ]
    ]);
    exit;
}

$userMsg = htmlspecialchars($data["message"]);

$response = "AI: You said → $userMsg";

echo json_encode([
    "choices" => [
        ["message" => ["content" => $response]]
    ]
]);
exit;
?>
