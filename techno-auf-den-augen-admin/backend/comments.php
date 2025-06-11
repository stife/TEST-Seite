<?php
require_once __DIR__ . '/facebook-api.php';

function getComments(string $postId): array {
    global $fb;
    return $fb->get("$postId/comments");
}

function replyComment(string $commentId, string $message): array {
    global $fb;
    return $fb->post("$commentId/replies", ['message' => $message]);
}
