<?php
// seller_dashboard.php - Seller Dashboard
session_start();
if (!isset($_SESSION['user_id']) || ($_SESSION['user_role'] ?? '') !== 'seller') {
    header("Location: login/login.php");
    exit();
}

$user_name = $_SESSION['user_name'] ?? 'Seller';
$user_email = $_SESSION['user_email'] ?? '';

// TODO: Fetch seller's products and orders
$products = [];
$orders = [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard - SeamLink</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-link"></i> SeamLink
            </a>
            <div class="navbar-nav ms-auto">
                <span class="navbar-text me-3">Welcome, <?= htmlspecialchars($user_name) ?>!</span>
                <a class="nav-link" href="login/logout.php">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
    <h1><i class="fas fa-store"></i> Seller Dashboard</h1>
    <p class="text-muted">Manage your products and view your orders.</p>
    <a href="login/logout.php" class="btn btn-danger mb-3"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Your Products</h5>
                        <?php if (empty($products)): ?>
                            <p>No products listed yet.</p>
                        <?php else: ?>
                            <ul>
                                <?php foreach ($products as $product): ?>
                                    <li><?= htmlspecialchars($product['name']) ?> - GHC <?= htmlspecialchars($product['price']) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <a href="#" class="btn btn-primary mt-2">Add New Product</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Your Orders</h5>
                        <?php if (empty($orders)): ?>
                            <p>No orders yet.</p>
                        <?php else: ?>
                            <ul>
                                <?php foreach ($orders as $order): ?>
                                    <li>Order #<?= htmlspecialchars($order['id']) ?> - <?= htmlspecialchars($order['status']) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
