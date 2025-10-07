<?php
// orders.php - Customer order history
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login/login.php");
    exit();
}
require_once __DIR__ . '/settings/core.php';
require_once __DIR__ . '/controllers/order_controller.php';
// Fetch orders via controller (MVC)
$orders = get_orders_by_user_ctr($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4">
        <h1>My Orders</h1>
        <?php if (empty($orders)): ?>
            <div class="alert alert-info">No orders found.</div>
        <?php else: ?>
            <table class="table table-bordered">
                <thead>
                    <tr><th>Order ID</th><th>Date</th><th>Status</th><th>Total</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?= htmlspecialchars($order['id']) ?></td>
                            <td><?= htmlspecialchars($order['created_at']) ?></td>
                            <td><?= htmlspecialchars($order['status']) ?></td>
                            <td>GHC <?= htmlspecialchars($order['total']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <a href="dashboard.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
    </div>
</body>
</html>
