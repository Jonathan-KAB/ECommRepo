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
    <nav style="display: flex; justify-content: space-between; align-items: center; background: #222; color: #fff; padding: 1rem;">
        <span style="font-size: 1.5rem; font-weight: bold;">SeamLink Admin Panel</span>
        <a href="../login/logout.php" style="color: #fff; text-decoration: none; background: #c00; padding: 0.5rem 1rem; border-radius: 4px;">Sign Out</a>
    </nav>
    <h1 style="margin-top: 1.5rem;">Admin Panel</h1>
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
    <hr>
    <h2>Main Page Preview</h2>
    <iframe src="../index.php" style="width:100%;height:400px;border:1px solid #ccc;"></iframe>
    <div style="margin: 1rem 0;">
        <a href="edit_main_content.php" style="background: #007bff; color: #fff; padding: 0.5rem 1rem; border-radius: 4px; text-decoration: none;">Edit Main Page Content</a>
    </div>
    <a href="../index.php">Back to Home</a>
</body>
</html>
