<?php

session_start();

$aula = isset($_POST['aula']) ? (int) $_POST['aula'] : 0;

header('Content-Type: application/json; charset=utf-8');

if ($aula < 1 || $aula > 5) {
    http_response_code(400);
    echo json_encode(['ok' => false]);
    exit;
}

$_SESSION['video_concluido_' . $aula] = true;
echo json_encode(['ok' => true]);
