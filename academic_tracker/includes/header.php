<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../config.php';

$current_page_title = $page_title ?? 'Academic Tracker';

?>
<!DOCTYPE html>
<html lang="en" class="h-100"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($current_page_title) . ' - ' . SITE_NAME; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/css/style.css">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content-wrap {
            flex: 1;
            padding-top: 56px;
        }
        .navbar {
            z-index: 1030;
        }
        .container.mt-5.pt-4 {
            padding-top: 3rem !important;
        }
        .card {
            margin-bottom: 1.5rem;
        }
    </style>

</head>
<body class="d-flex flex-column h-100">

    <main class="flex-shrink-0 content-wrap">
