<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function redirect($url) {
    header("Location: " . $url);
    exit();
}

function sanitize_output($data) {
    return htmlspecialchars((string)$data, ENT_QUOTES, 'UTF-8');
}

?>
