<?php
$page_title = 'Manager - View Bookings';
require_once 'db.php';

try {
    $stmt = $pdo->query("SELECT * FROM booking ORDER BY created_at DESC");
    $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die("Database error: " . $e->getMessage());
}

ob_start();
?>
    <style>
        .table-dark {
            --bs-table-bg: rgba(255, 255, 255, 0.05);
            --bs-table-striped-bg: rgba(255, 255, 255, 0.08);
            border-color: rgba(255,255,255,0.1);
        }
        .manager-container {
            margin-top: 100px;
            margin-bottom: 50px;
            background: rgba(0,0,0,0.4);
            padding: 30px;
            border-radius: 12px;
            border: 1px solid rgba(255,255,255,0.1);
        }
    </style>
<?php
$extra_styles = ob_get_clean();
include 'header.php';
?>

<div class="container manager-container">
    <h2 class="text-center mb-4" style="color: #c9a35e;">All Bookings</h2>
    
    <div class="mb-4 text-end">
        <a href="manager_messages.php" class="btn btn-outline-light btn-sm">View Messages Instead</a>
    </div>

    <div class="table-responsive">
        <table class="table table-dark table-striped table-hover align-middle">
            <thead>
                <tr>
                    <th>Ref ID</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Event Details</th>
                    <th>Location</th>
                    <th>Date Booked</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($bookings) > 0): ?>
                    <?php foreach($bookings as $b): ?>
                        <tr>
                            <td><span class="badge bg-secondary"><?= htmlspecialchars($b['booking_reference']) ?></span></td>
                            <td><?= htmlspecialchars($b['full_name']) ?></td>
                            <td>
                                <?= htmlspecialchars($b['phone']) ?><br>
                                <small class="text-muted"><?= htmlspecialchars($b['email']) ?></small>
                            </td>
                            <td>
                                <strong>Date:</strong> <?= htmlspecialchars($b['event_date']) ?> <?= htmlspecialchars($b['event_time']) ?><br>
                                <strong>Type:</strong> <?= htmlspecialchars($b['event_types']) ?><br>
                                <strong>Guests:</strong> <?= htmlspecialchars($b['guests']) ?><br>
                                <small class="text-warning">Services: <?= htmlspecialchars($b['services']) ?></small><br>
                                <small class="text-info">Pkg: <?= htmlspecialchars($b['packages']) ?></small>
                            </td>
                            <td><?= htmlspecialchars($b['hometown']) ?>, <?= htmlspecialchars($b['district']) ?></td>
                            <td><small><?= date('M d, Y', strtotime($b['created_at'])) ?></small></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="6" class="text-center py-4">No bookings found in the database.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>
