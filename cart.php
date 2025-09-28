<?php
// cart.php - Shopping Cart Page
require_once 'settings/core.php';
session_start();
// For MVP: fetch cart from session
$cart = [];
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    // Placeholder: fetch product details for each product_id
    foreach ($_SESSION['cart'] as $product_id => $qty) {
        // TODO: Replace with real DB fetch
        $cart[] = [
            'id' => $product_id,
            'name' => 'Product #' . $product_id,
            'quantity' => $qty,
            'price' => 10.00, // Placeholder price
        ];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart - SeamLink</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Your Shopping Cart</h1>
    <?php if (empty($cart)): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <table>
            <tr><th>Product</th><th>Qty</th><th>Price</th><th>Remove</th></tr>
            <?php foreach ($cart as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['name']) ?></td>
                    <td><?= htmlspecialchars($item['quantity']) ?></td>
                    <td>$<?= htmlspecialchars($item['price']) ?></td>
                    <td><form method="post" action="actions/remove_from_cart_action.php"><input type="hidden" name="product_id" value="<?= htmlspecialchars($item['id']) ?>"><button type="submit">Remove</button></form></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="checkout.php">Proceed to Checkout</a>
    <?php endif; ?>
    <a href="products.php">Continue Shopping</a>
</body>
</html>
