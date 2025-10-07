<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// profile.php - Customer profile editing
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login/login.php");
    exit();
}
require_once __DIR__ . '/settings/core.php';
require_once __DIR__ . '/controllers/user_controller.php';

$user = get_user_by_email_ctr($_SESSION['user_email']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update profile fields
    $name = $_POST['name'] ?? $user['name'];
    $phone_number = $_POST['phone_number'] ?? $user['phone_number'];
    $country = $_POST['country'] ?? $user['country'];
    $city = $_POST['city'] ?? $user['city'];
    $updated = update_user_ctr($user['id'], $name, $phone_number, $country, $city);
    if ($updated) {
        $user = get_user_by_email_ctr($_SESSION['user_email']);
        $message = 'Profile updated!';
    } else if (isset($_POST['name'])) {
        $message = 'Failed to update profile.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4">
        <h1>Edit Profile</h1>
        <?php if (!empty($message)): ?>
            <div class="alert alert-info"> <?= htmlspecialchars($message) ?> </div>
        <?php endif; ?>
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= htmlspecialchars($user['phone_number']) ?>">
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" name="country" value="<?= htmlspecialchars($user['country']) ?>">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" value="<?= htmlspecialchars($user['city']) ?>">
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="dashboard.php" class="btn btn-secondary ms-2">Back to Dashboard</a>
        </form>
    </div>
</body>
</html>
