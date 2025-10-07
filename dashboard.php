<?php
// dashboard.php - User Dashboard
session_start();
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login/login.php");
    exit();
}

require_once 'settings/core.php';

$user_name = $_SESSION['user_name'] ?? 'User';
$user_email = $_SESSION['user_email'] ?? '';
$user_role = $_SESSION['user_role'] ?? 'buyer';

// Redirect sellers to seller dashboard
if ($user_role === 'seller') {
    header('Location: seller_dashboard.php');
    exit();
}

// TODO: Fetch user's orders and other data
$orders = [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SeamLink</title>
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
        <div class="row">
            <div class="col-md-12">
                <h1><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
                <p class="text-muted">Welcome to your SeamLink dashboard</p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="fas fa-user fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Profile</h5>
                        <p class="card-text">Manage your account information</p>
                        <a href="#" class="btn btn-primary">View Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="fas fa-shopping-bag fa-3x text-success mb-3"></i>
                        <h5 class="card-title">My Orders</h5>
                        <p class="card-text">Track your order history</p>
                        <a href="#" class="btn btn-success">View Orders</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="fas fa-shopping-cart fa-3x text-warning mb-3"></i>
                        <h5 class="card-title">Shopping</h5>
                        <p class="card-text">Continue shopping</p>
                        <a href="products.php" class="btn btn-warning">Browse Products</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fas fa-clock"></i> Recent Activity</h5>
                    </div>
                    <div class="card-body">
                        <?php if (empty($orders)): ?>
                            <p class="text-muted">No recent orders. <a href="products.php">Start shopping!</a></p>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($orders as $order): ?>
                                            <tr>
                                                <td>#<?= htmlspecialchars($order['id']) ?></td>
                                                <td><?= htmlspecialchars($order['date']) ?></td>
                                                <td><?= htmlspecialchars($order['status']) ?></td>
                                                <td>GH₵<?= htmlspecialchars($order['total']) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fas fa-info-circle"></i> Account Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Name:</strong> <?= htmlspecialchars($user_name) ?></p>
                                <p><strong>Email:</strong> <?= htmlspecialchars($user_email) ?></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Account Type:</strong> 
                                    <?= $user_role == 2 ? 'Administrator' : 'Customer' ?>
                                </p>
                                <p><strong>Member Since:</strong> Today</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
