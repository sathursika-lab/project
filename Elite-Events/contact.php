<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Database Connection
    // Assuming db.php is in the same directory or adjust the path (e.g., '../db.php') if needed
    require_once 'db.php'; }

// -------------------- FORM HANDLING --------------------
$success_msg = '';
$error_msg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_contact'])) {
    $full_name = htmlspecialchars(trim($_POST['full_name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (!empty($full_name) && !empty($email) && !empty($message)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO contact_messages (full_name, email, phone, message) VALUES (?, ?, ?, ?)");
            $stmt->execute([$full_name, $email, $phone, $message]);
            $success_msg = "Your message has been sent successfully!";
        } catch (Exception $e) {
            $error_msg = "Database error: " . $e->getMessage();
        }
    } else {
        $error_msg = "Please fill in all required fields.";
    }
}
?>
 <style>
        .contact-card {
            text-align: center;
            padding: 40px 20px;
            height: 100%;
        }

        .contact-detail-box {
            background: rgba(255, 255, 255, 0.05);
            padding: 10px;
            border-radius: 8px;
            margin-top: 15px;
            min-height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
        }

        .contact-form-box {
            background: rgba(255, 255, 255, 0.03);
            padding: 40px;
            border-radius: 12px;
            border: 1px solid rgba(255,255,255,0.05);
            margin-top: 50px;
        }

        .contact-form-box .form-control {
            background: rgba(0,0,0,0.2);
            border: 1px solid rgba(255,255,255,0.1);
            color: white;
        }

        .contact-form-box .form-control:focus {
            background: rgba(0,0,0,0.4);
            border-color: #c9a35e;
            box-shadow: none;
            color: white;
        }
    </style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite - Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body { background: #111; color: white; font-family: Arial, sans-serif; }
        .contact-card, .contact-form-card { background: rgba(246, 251, 248, 0.05); padding: 30px; border-radius: 10px; margin-bottom: 30px; }
        .form-control { background: transparent; border: 1px solid #555; color: white; }
        .form-control::placeholder { color: #aaa; }
        .btn-book { background: #e0e0e0; color: black; font-weight: 600; border-radius: 10px; padding: 10px 25px; }
        .alert { text-align: center; }
    </style>
</head>
<body>
     <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="../logo.jpeg" alt="Elite Logo" style="height: 50px; border-radius: 50%;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="booking.php">Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gallery.php">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="container py-5">
    <h1 class="text-center mb-4">Get in Touch with Us</h1>


    <div class="row g-4">

        <!-- Contact Info Cards -->
        <div class="col-md-6 col-lg-4">
                <div class="glass-card contact-card">
                    <i class="fa-solid fa-location-dot contact-icon"></i>
                    <h4 class="mb-3">Our Office Location</h4>
                    <div class="contact-detail-box">
                        <small>123 Clock Tower Road Jaffna</small>
                    </div>
                </div>
            </div>

        
            <div class="col-md-6 col-lg-4">
                <div class="glass-card contact-card">
                    <i class="fa-solid fa-phone contact-icon"></i>
                    <h4 class="mb-3">Phone</h4>
                    <div class="contact-detail-box">
                        <small>0123456789</small>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="glass-card contact-card">
                    <i class="fa-solid fa-envelope contact-icon"></i>
                    <h4 class="mb-3">Email</h4>
                    <div class="contact-detail-box">
                        <small>helloeliteevents@gmail.com</small>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="glass-card contact-card">
                    <i class="fa-solid fa-clock contact-icon"></i>
                    <h4 class="mb-3">Working Hours</h4>
                    <div class="contact-detail-box">
                        <small>Mon - Sat: 9:00 AM - 6:00 PM</small>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="glass-card contact-card">
                    <i class="fa-brands fa-whatsapp contact-icon"></i>
                    <h4 class="mb-3">WhatsApp</h4>
                    <div class="contact-detail-box">
                        <small>075 1256789</small>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="glass-card contact-card">
                    <i class="fa-brands fa-instagram contact-icon"></i>
                    <h4 class="mb-3">Instagram</h4>
                    <div class="contact-detail-box">
                        <small>@elite_events_official</small>
                    </div>
                </div>
            </div>


        <!-- Contact Form -->
        <div class="col-12">
            <div class="contact-form-card">
                <h3 class="mb-3 text-center">Send us a message</h3>
                <form method="POST" action="">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" name="full_name" class="form-control" placeholder="Full Name" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="phone" class="form-control" placeholder="Phone (optional)">
                        </div>
                        <div class="col-12">
                            <textarea name="message" class="form-control" rows="5" placeholder="Your Message" required></textarea>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" name="submit_contact" class="btn btn-book">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

</body>
</html>