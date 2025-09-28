<?php
// admin/dashboard.php - Admin Panel (Basic)
require_once '../settings/core.php';
// TODO: Fetch pending sellers, products to moderate, etc.
$pendingSellers = [];
$pendingProducts = [];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - SeamLink</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <h1>Admin Panel</h1>
    <h2>Pending Sellers</h2>
    <?php if (empty($pendingSellers)): ?>
        <p>No pending sellers.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($pendingSellers as $seller): ?>
                <li><?= htmlspecialchars($seller['name']) ?> <form method="post" action="../actions/approve_seller_action.php" style="display:inline;"><input type="hidden" name="seller_id" value="<?= htmlspecialchars($seller['id']) ?>"><button type="submit">Approve</button></form></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <h2>Pending Products</h2>
    <?php if (empty($pendingProducts)): ?>
        <p>No products to moderate.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($pendingProducts as $product): ?>
                <li><?= htmlspecialchars($product['name']) ?> <form method="post" action="../actions/approve_product_action.php" style="display:inline;"><input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']) ?>"><button type="submit">Approve</button></form></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a href="../index.php">Back to Home</a>
</body>
</html>
