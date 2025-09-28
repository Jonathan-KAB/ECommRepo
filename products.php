<?php
// products.php - Product Catalog Page
require_once 'settings/core.php';
require_once 'controllers/customer_controller.php';
session_start();
// For MVP: placeholder products
$products = [];
for ($i = 1; $i <= 5; $i++) {
    $products[] = [
        'id' => $i,
        'name' => 'Product #' . $i,
        'image' => 'https://via.placeholder.com/150',
        'description' => 'Description for product #' . $i,
        'price' => 10.00 * $i,
    ];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Catalog - SeamLink</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Product Catalog</h1>
    <div id="product-list">
        <?php if (empty($products)): ?>
            <p>No products available yet.</p>
        <?php else: ?>
            <?php foreach ($products as $product): ?>
                <div class="product-item">
                    <h2><?= htmlspecialchars($product['name']) ?></h2>
                    <img src="<?= htmlspecialchars($product['image']) ?>" alt="Product Image" width="150">
                    <p><?= htmlspecialchars($product['description']) ?></p>
                    <p>Price: $<?= htmlspecialchars($product['price']) ?></p>
                    <a href="product_details.php?id=<?= urlencode($product['id']) ?>">View Details</a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>
