<?php
require_once __DIR__ . '/posts.php';
require_once __DIR__ . '/comments.php';
require_once __DIR__ . '/analytics.php';
require_once __DIR__ . '/engagement.php';

header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'] ?? '';

try {
    switch ($action) {
        case 'createPost':
            echo json_encode(createPost($_POST['pageId'], $_POST['message']));
            break;
        case 'schedulePost':
            $time = intval($_POST['timestamp']);
            echo json_encode(schedulePost($_POST['pageId'], $_POST['message'], $time));
            break;
        case 'deletePost':
            echo json_encode(deletePost($_POST['postId']));
            break;
        case 'getPosts':
            $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 10;
            echo json_encode(getPosts($_GET['pageId'], $limit));
            break;
        case 'getComments':
            echo json_encode(getComments($_GET['postId']));
            break;
        case 'replyComment':
            echo json_encode(replyComment($_POST['commentId'], $_POST['message']));
            break;
        case 'getInsights':
            $metrics = isset($_GET['metrics']) ? explode(',', $_GET['metrics']) : [];
            echo json_encode(getInsights($_GET['pageId'], $metrics));
            break;
        case 'getReactions':
            echo json_encode(getReactions($_GET['postId']));
            break;
        case 'getShares':
            echo json_encode(getShares($_GET['postId']));
            break;
        default:
            http_response_code(400);
            echo json_encode(['error' => 'unknown action']);
    }
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
