<?php
// --- PHP PROCESSING LOGIC --
$message_sent = false;
$error_msg = "";
$first_name = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Database Connection
    // Assuming db.php is in the same directory or adjust the path (e.g., '../db.php') if needed
    require_once 'db.php'; 

    // 2. Sanitize Input Data
    $first_name   = htmlspecialchars($_POST['first_name'] ?? '');
    $last_name    = htmlspecialchars($_POST['last_name'] ?? '');
    $full_name    = trim($first_name . ' ' . $last_name);
    $phone        = htmlspecialchars($_POST['phone'] ?? '');
    $email        = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $event_date   = $_POST['event_date'] ?? '';
    $event_time   = $_POST['event_time'] ?? '';
    $guest_count  = (int)($_POST['guests'] ?? 0);
    $town         = htmlspecialchars($_POST['town'] ?? '');
    $district     = htmlspecialchars($_POST['district'] ?? '');

    // 3. Handle Checkboxes (Arrays) and Select dropdowns
    $event_types  = isset($_POST['event_types']) ? implode(", ", $_POST['event_types']) : "None";
    $services     = isset($_POST['services']) ? implode(", ", $_POST['services']) : "None";
    $package      = $_POST['package'] ?? "None selected";

    // 4. Validate and Insert into Database
    if (!empty($first_name) && !empty($phone) && !empty($event_date)) {
        $booking_ref = 'ELITE-' . strtoupper(substr(uniqid(), -5));
        
        try {
            $stmt = $pdo->prepare("INSERT INTO booking 
                (booking_reference, full_name, phone, email, event_date, event_time, event_types, guests, services, packages, hometown, district) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            
            $stmt->execute([
                $booking_ref, $full_name, $phone, $email, $event_date, $event_time, 
                $event_types, $guest_count, $services, $package, $town, $district
            ]);
            
            $message_sent = true;
        } catch (Exception $e) {
            $error_msg = "Database error: " . $e->getMessage();
        }
    } else {
        $error_msg = "Please fill in all required fields (Name, Phone, Date).";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Event | Elite Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to right, #000, #1a1a1a);
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            padding-top: 80px;
        }
        .container-box {
            max-width: 900px;
            margin: auto;
            padding: 40px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            margin-bottom: 50px;
        }
        h1 { text-align: center; margin-bottom: 40px; font-weight: bold; }
        .form-control {
            background: transparent;
            border: 1px solid #555;
            color: white;
        }
        .form-control:focus {
            background: rgba(255,255,255,0.1);
            color: white;
            border-color: #fff;
        }
        .form-control::placeholder { color: #aaa; }
        .btn-book {
            background: #e0e0e0;
            color: black;
            font-weight: 600;
            border-radius: 10px;
            padding: 10px 40px;
            transition: 0.3s;
        }
        .btn-book:hover { background: #fff; transform: translateY(-2px); }
        .navbar { background: rgba(0,0,0,0.9); border-bottom: 1px solid #333; }
        .nav-link { color: white !important; }
        footer { padding: 40px 0; background: #000; border-top: 1px solid #333; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="../logo.jpeg" alt="Logo" style="height: 50px; border-radius: 50%;"></a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="booking.php">Booking</a></li>
                    <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container container-box">
        <?php if ($message_sent): ?>
            <div class="alert alert-success">Thank you, <?php echo htmlspecialchars($first_name); ?>! Your booking request has been securely saved to the database.</div>
        <?php endif; ?>
        <?php if ($error_msg): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error_msg); ?></div>
        <?php endif; ?>

        <h1>Book your Event</h1>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="row mb-3">
                <label class="col-md-3">Full Name</label>
                <div class="col-md-4"><input type="text" name="first_name" class="form-control" placeholder="First Name" required></div>
                <div class="col-md-5"><input type="text" name="last_name" class="form-control" placeholder="Last Name" required></div>
            </div>

            <div class="row mb-3">
                <label class="col-md-3">Phone Number</label>
                <div class="col-md-9"><input type="text" name="phone" class="form-control" placeholder="+1..." required></div>
            </div>

            <div class="row mb-3">
                <label class="col-md-3">Email Address</label>
                <div class="col-md-9"><input type="email" name="email" class="form-control" placeholder="email@example.com" required></div>
            </div>

            <div class="row mb-3">
                <label class="col-md-3">Event Date/Time</label>
                <div class="col-md-4"><input type="date" name="event_date" class="form-control" required style="color-scheme: dark;"></div>
                <div class="col-md-5"><input type="time" name="event_time" class="form-control" required style="color-scheme: dark;"></div>
            </div>

            <div class="row mb-3">
                <label class="col-md-3">Event Type</label>
                <div class="col-md-9">
                    <?php $types = ['Wedding', 'Birthday', 'Baby Showers', 'Business', 'Other']; 
                    foreach($types as $type): ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="event_types[]" value="<?php echo $type; ?>">
                        <label class="form-check-label"><?php echo $type; ?></label>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-md-3">Number of Guests</label>
                <div class="col-md-9"><input type="number" name="guests" class="form-control"></div>
            </div>

            <div class="row mb-3">
                <label class="col-md-3">Service Selection</label>
                <div class="col-md-9">
                    <?php $servs = ['Hall Booking', 'Photo/Video', 'Decoration', 'Food / Catering', 'DJ & Music']; 
                    foreach($servs as $s): ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="services[]" value="<?php echo $s; ?>">
                        <label class="form-check-label"><?php echo $s; ?></label>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-md-3">Package</label>
                <div class="col-md-9">
                    <select name="package" class="form-control">
                        <option value="Basic Package">Basic Package</option>
                        <option value="Standard Package">Standard Package</option>
                        <option value="Premium Package">Premium Package</option>
                        <option value="Custom Budget">Custom Budget</option>
                    </select>
                </div>
            </div>

            <div class="row mb-4">
                <label class="col-md-3">Location</label>
                <div class="col-md-4"><input type="text" name="town" class="form-control" placeholder="Home town"></div>
                <div class="col-md-3"><input type="text" name="district" class="form-control" placeholder="District"></div>
                <div class="col-md-2"><button type="button" class="btn btn-secondary w-100">Map</button></div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-book">Confirm Booking</button>
            </div>
        </form>
    </div>

    <footer>
        <div class="container text-center">
            <img src="../logo.jpeg" alt="Elite Logo" style="height: 60px; border-radius: 50%; margin-bottom: 15px;">
            <p>© 2026 Elite Events. Elevating your special moments.</p>
        </div>
    </footer>

</body>
</html>