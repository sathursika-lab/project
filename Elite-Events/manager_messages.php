<?php
$page_title = 'Manager - View Messages';
require_once 'db.php';

try {
    $stmt = $pdo->query("SELECT * FROM contact ORDER BY created_at DESC");
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <h2 class="text-center mb-4" style="color: #c9a35e;">Customer Messages</h2>
    
    <div class="mb-4 text-end">
        <a href="manager_bookings.php" class="btn btn-outline-light btn-sm">View Bookings Instead</a>
    </div>

    <div class="table-responsive">
        <table class="table table-dark table-striped table-hover align-middle">
            <thead>
                <tr>
                    <th style="width: 20%;">Name</th>
                    <th style="width: 20%;">Email</th>
                    <th style="width: 45%;">Message</th>
                    <th style="width: 15%;">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($messages) > 0): ?>
                    <?php foreach($messages as $m): ?>
                        <tr>
                            <td><strong><?= htmlspecialchars($m['name']) ?></strong></td>
                            <td><a href="mailto:<?= htmlspecialchars($m['email']) ?>" class="text-info text-decoration-none"><?= htmlspecialchars($m['email']) ?></a></td>
                            <td><?= nl2br(htmlspecialchars($m['message'])) ?></td>
                            <td><small class="text-muted"><?= date('M d, Y h:i A', strtotime($m['created_at'])) ?></small></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4" class="text-center py-4">No messages found in the database.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>
