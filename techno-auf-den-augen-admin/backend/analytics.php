<?php
require_once __DIR__ . '/facebook-api.php';

function getInsights(string $pageId, array $metrics): array {
    global $fb;
    $metricStr = implode(',', $metrics);
    return $fb->get("$pageId/insights", ['metric' => $metricStr]);
}
