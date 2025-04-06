<?php
session_start();
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Rincón del Arte</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="font-poppins bg-gradient-to-br from-purple-50 to-blue-50">
    <?php include 'header.php'; ?>
    <div class="flex min-h-screen">
        <?php include 'sidebar.php'; ?>
        <main class="flex-1 p-8">
            <?php 
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';
            $allowed_pages = ['home', 'arte-piano', 'manualidades-diy', 'arte-pintura', 'arte-dibujo', 'create-course'];
            
            if(in_array($page, $allowed_pages)) {
                include "pages/$page.php";
            } else {
                include "pages/home.php";
            }
            ?>
        </main>
    </div>
    <?php include 'footer.php'; ?>
    <script src="scripts.js"></script>
</body>
</html>