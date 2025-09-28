<?php
// dashboard.php - Seller Dashboard
require_once 'settings/core.php';
// TODO: Fetch seller's products and orders
$products = [];
$orders = [];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Seller Dashboard - SeamLink</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Seller Dashboard</h1>
    <h2>Your Products</h2>
    <?php if (empty($products)): ?>
        <p>No products listed yet.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($products as $product): ?>
                <li><?= htmlspecialchars($product['name']) ?> - $<?= htmlspecialchars($product['price']) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <h2>Your Orders</h2>
    <?php if (empty($orders)): ?>
        <p>No orders yet.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($orders as $order): ?>
                <li>Order #<?= htmlspecialchars($order['id']) ?> - <?= htmlspecialchars($order['status']) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a href="index.php">Back to Home</a>
</body>
</html>
