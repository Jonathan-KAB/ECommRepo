<?php
// product_details.php - Product Details Page
require_once 'settings/core.php';
require_once 'controllers/customer_controller.php';
session_start();
// Get product ID from query
$id = $_GET['id'] ?? null;
$product = null;
// TODO: Fetch product details using controller
if ($id) {
    // Placeholder: Replace with real DB fetch
    $product = [
        'id' => $id,
        'name' => 'Product #' . $id,
        'image' => 'https://via.placeholder.com/200',
        'description' => 'Description for product #' . $id,
        'price' => 10.00,
    ];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Details - SeamLink</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php if (!$product): ?>
        <p>Product not found.</p>
    <?php else: ?>
        <h1><?= htmlspecialchars($product['name']) ?></h1>
        <img src="<?= htmlspecialchars($product['image']) ?>" alt="Product Image" width="200">
        <p><?= htmlspecialchars($product['description']) ?></p>
        <p>Price: $<?= htmlspecialchars($product['price']) ?></p>
        <form method="post" action="actions/add_to_cart_action.php">
            <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']) ?>">
            <button type="submit">Add to Cart</button>
        </form>
    <?php endif; ?>
    <a href="products.php">Back to Catalog</a>
</body>
</html>
