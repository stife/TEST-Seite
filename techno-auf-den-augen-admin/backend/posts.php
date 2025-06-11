<?php
require_once __DIR__ . '/facebook-api.php';

function createPost(string $pageId, string $message): array {
    global $fb;
    return $fb->post("$pageId/feed", ['message' => $message]);
}

function schedulePost(string $pageId, string $message, int $timestamp): array {
    global $fb;
    return $fb->post("$pageId/feed", [
        'message' => $message,
        'published' => 'false',
        'scheduled_publish_time' => $timestamp
    ]);
}

function getPosts(string $pageId, int $limit = 10): array {
    global $fb;
    return $fb->get("$pageId/posts", ['limit' => $limit]);
}

function deletePost(string $postId): array {
    global $fb;
    return $fb->delete($postId);
}
