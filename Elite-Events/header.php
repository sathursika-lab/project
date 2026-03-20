<?php
$current_page = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_title) ? $page_title : 'Elite - Event Management Platform';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    
    <?php if (isset($extra_styles)) echo $extra_styles; ?>
</head>

<body>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="../logo.jpeg" alt="Elite Logo" style="height: 50px; border-radius: 50%;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'index.php') ? 'active' : '' ?>" <?= ($current_page == 'index.php') ? 'aria-current="page"' : '' ?> href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'booking.php') ? 'active' : '' ?>" <?= ($current_page == 'booking.php') ? 'aria-current="page"' : '' ?> href="booking.php">Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'services.php') ? 'active' : '' ?>" <?= ($current_page == 'services.php') ? 'aria-current="page"' : '' ?> href="services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'gallery.php') ? 'active' : '' ?>" <?= ($current_page == 'gallery.php') ? 'aria-current="page"' : '' ?> href="gallery.php">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'contact.php') ? 'active' : '' ?>" <?= ($current_page == 'contact.php') ? 'aria-current="page"' : '' ?> href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
