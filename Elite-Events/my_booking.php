<?php
$page_title = 'Track My Booking';
ob_start();

$booking = null;
$error_msg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['track_booking'])) {
    require_once 'db.php';
    
    $booking_ref = htmlspecialchars(trim($_POST['booking_ref']));
    
    if (!empty($booking_ref)) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM booking WHERE booking_reference = ?");
            $stmt->execute([$booking_ref]);
            $booking = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$booking) {
                $error_msg = "Booking not found. Please review the Booking ID.";
            }
        } catch (Exception $e) {
            $error_msg = "Database error.";
        }
    } else {
        $error_msg = "Please enter your Booking ID.";
    }
}
?>
    <style>
        .track-box {
            background: rgba(255, 255, 255, 0.03);
            padding: 40px;
            border-radius: 12px;
            border: 1px solid rgba(255,255,255,0.05);
            margin-top: 50px;
        }

        .booking-details-box {
            background: rgba(255, 255, 255, 0.05);
            padding: 30px;
            border-radius: 12px;
            border: 1px solid rgba(255,255,255,0.1);
        }
    </style>
<?php
$extra_styles = ob_get_clean();
include 'header.php';
?>

    <header class="page-header">
        <div class="container">
            <h1 class="page-title">Track My Booking</h1>
        </div>
    </header>

    <section class="container py-5 mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="track-box glass-card">
                    <h3 class="text-center mb-4" style="color: #c9a35e;">Enter Your Booking ID</h3>
                    
                    <?php if($error_msg): ?>
                        <div class="alert alert-danger text-center border-0" style="background: rgba(220, 53, 69, 0.2); color: #f8d7da;"><?= $error_msg ?></div>
                    <?php endif; ?>

                    <form method="POST" action="my_booking.php">
                        <div class="mb-3">
                            <input type="text" name="booking_ref" class="form-control text-center py-3" placeholder="e.g. ELITE-A1B2C" value="<?= isset($_POST['booking_ref']) ? htmlspecialchars($_POST['booking_ref']) : '' ?>" style="background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); color: white; font-size: 1.2rem; letter-spacing: 2px;" required>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" name="track_booking" class="btn btn-primary-custom px-5 py-2">
                                <i class="fa-solid fa-magnifying-glass me-2"></i> Track
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php if($booking): ?>
            <div class="row justify-content-center mt-5">
                <div class="col-lg-8">
                    <div class="booking-details-box glass-card">
                        <h4 class="mb-4 text-center border-bottom pb-3" style="color: #c9a35e;">Booking Details: <?= htmlspecialchars($booking['booking_reference']) ?></h4>
                        
                        <div class="row mb-3">
                            <div class="col-sm-4 text-muted">Client Name:</div>
                            <div class="col-sm-8 text-white"><?= htmlspecialchars($booking['full_name']) ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 text-muted">Contact Info:</div>
                            <div class="col-sm-8 text-white"><?= htmlspecialchars($booking['phone']) ?> | <?= htmlspecialchars($booking['email']) ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 text-muted">Event Details:</div>
                            <div class="col-sm-8 text-white"><?= htmlspecialchars($booking['event_types']) ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 text-muted">Date & Time:</div>
                            <div class="col-sm-8 text-white"><?= htmlspecialchars($booking['event_date']) ?> at <?= htmlspecialchars($booking['event_time']) ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 text-muted">Guests:</div>
                            <div class="col-sm-8 text-white"><?= htmlspecialchars($booking['guests']) ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 text-muted">Services Requested:</div>
                            <div class="col-sm-8 text-white"><?= htmlspecialchars($booking['services']) ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 text-muted">Package:</div>
                            <div class="col-sm-8 text-white"><?= htmlspecialchars($booking['packages']) ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 text-muted">Location:</div>
                            <div class="col-sm-8 text-white"><?= htmlspecialchars($booking['hometown']) ?>, <?= htmlspecialchars($booking['district']) ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 text-muted">Booking Date:</div>
                            <div class="col-sm-8 text-white"><?= htmlspecialchars($booking['created_at']) ?></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </section>

<?php include 'footer.php'; ?>
