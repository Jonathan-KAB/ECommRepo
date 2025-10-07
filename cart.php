<?php
// cart.php - Shopping Cart Page
require_once __DIR__ . '/settings/core.php';
require_once __DIR__ . '/controllers/cart_controller.php';
session_start();
// Fetch cart items via controller (MVC)
$cart = [];
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    $cart = get_cart_items_ctr($_SESSION['cart']);
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
