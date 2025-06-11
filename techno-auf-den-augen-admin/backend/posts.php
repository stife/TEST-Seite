<?php
require_once __DIR__ . '/facebook-api.php';

function createPost(string $pageId, string $message): array {
    global $fb;
    return $fb->post("$pageId/feed", ['message' => $message]);
}

function deletePost(string $postId): array {
    global $fb;
    return $fb->delete($postId);
}
