<?php
$page_title = 'Elite - Event Management Platform';
include 'header.php';
?>

    <section class="hero-section text-center">
        <div class="hero-bg-glow"></div>
        <div class="container hero-content">
            <span class="hero-subtitle">Welcome to Elite Event Management Platform</span>
            <h1 class="hero-title">Event Management<br><span style="color: var(--primary-color);">Excellence</span></h1>
            <p class="hero-text">Your go-to platform for managing unforgettable events seamlessly.</p>
            <div class="hero-buttons">
                <a href="#services" class="btn btn-outline-custom me-2 px-4 py-2">Learn More</a>
                <a href="booking.php" class="btn btn-primary-custom px-4 py-2">Get Started</a>
            </div>
        </div>
    </section>

    <div class="container" id="main-content">

        <div class="row align-items-center mb-5 pe-0 pb-5">
            <div class="col-md-5 profile-card-wrapper mb-4 mb-md-0">
                <div class="glass-card d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="profile-img-container">
                            <img src="../profile1.jpg" alt="Profile Image" class="profile-img">
                        </div>
                        <div>
                            <h3 class="profile-name">sathursika subramanijam</h3>
                            <p class="profile-role">Event Manager</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-2 mb-4 mb-md-0 d-flex justify-content-center pt-5">
                <a href="contact.php" class="btn btn-outline-custom btn-sm"><i
                        class="fa-solid fa-phone me-2"></i>contact me</a>
            </div>

            <div class="col-md-5 services-intro pt-5" id="services">
                <h2 class="section-title mb-3">Explore Our Services</h2>
                <p class="text-muted mb-4">We offer a variety of services tailored for your unique event.</p>
                <a href="services.php" class="btn btn-primary-custom"><i class="fa-solid fa-list me-2"></i>View All
                    Services</a>
            </div>

            <div class="col-12 mt-4 text-end">
                <img src="C:\Users\HP\Desktop\6314 com2303\01.jpeg" class="img-fluid rounded shadow"
                    style="max-height: 250px; object-fit: cover; opacity: 0.8" alt="events">
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>
