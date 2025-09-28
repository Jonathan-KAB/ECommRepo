<?php
// checkout.php - Mocked Checkout Page
require_once 'settings/core.php';
// TODO: Handle checkout logic
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout - SeamLink</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Checkout</h1>
    <form method="post" action="actions/checkout_action.php">
        <label>Name:<br><input type="text" name="name" required></label><br>
        <label>Address:<br><input type="text" name="address" required></label><br>
        <label>Email:<br><input type="email" name="email" required></label><br>
        <button type="submit">Place Order</button>
    </form>
    <a href="cart.php">Back to Cart</a>
</body>
</html>
