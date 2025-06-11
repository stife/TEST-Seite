<?php
require_once __DIR__ . '/facebook-api.php';

function getReactions(string $postId): array {
    global $fb;
    return $fb->get("$postId/reactions", ['summary' => 'true']);
}

function getShares(string $postId): array {
    global $fb;
    return $fb->get("$postId", ['fields' => 'shares']);
}
