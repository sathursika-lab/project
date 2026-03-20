<?php
$page_title = 'Book Your Event';
ob_start();

$success_msg = '';
$error_msg = '';
$booking_ref = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_booking'])) {
    require_once 'db.php';
    
    $full_name = trim($_POST['first_name'] . ' ' . $_POST['last_name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $event_date = trim($_POST['event_date']);
    $event_time = trim($_POST['event_time']);
    $guests = isset($_POST['guests']) ? (int)$_POST['guests'] : 0;
    
    $event_types = isset($_POST['event_types']) ? implode(", ", $_POST['event_types']) : '';
    $services = isset($_POST['services']) ? implode(", ", $_POST['services']) : '';
    $packages = isset($_POST['packages']) ? implode(", ", $_POST['packages']) : '';
    
    $hometown = trim($_POST['hometown']);
    $district = trim($_POST['district']);
    
    if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($phone) && !empty($email) && !empty($event_date)) {

        $booking_ref = 'ELITE-' . strtoupper(substr(uniqid(), -5));

        try {
            $stmt = $pdo->prepare("INSERT INTO booking 
            (booking_reference, full_name, phone, email, event_date, event_time, event_types, guests, services, packages, hometown, district) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->execute([
                $booking_ref,
                $full_name,
                $phone,
                $email,
                $event_date,
                $event_time,
                $event_types,
                $guests,
                $services,
                $packages,
                $hometown,
                $district
            ]);

            $success_msg = "Booking successfully submitted! Your Booking ID is: <strong>$booking_ref</strong>";

        } catch (Exception $e) {
            $error_msg = "Database error: " . $e->getMessage();
        }

    } else {
        $error_msg = "Please fill in all required fields (Name, Phone, Email, Event Date).";
    }
} // ✅ THIS WAS MISSING
?>