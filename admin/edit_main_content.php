<?php
// admin/edit_main_content.php - Simple admin editor for main page content
session_start();
if (!isset($_SESSION['user_id']) || ($_SESSION['user_role'] ?? '') !== 'admin') {
    header('Location: ../login/login.php');
    exit();
}

$contentFile = '../main_content.html';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newContent = $_POST['main_content'] ?? '';
    file_put_contents($contentFile, $newContent);
    $message = 'Main page content updated!';
}

$mainContent = file_exists($contentFile) ? file_get_contents($contentFile) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Main Page Content</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4">
        <h1>Edit Main Page Content</h1>
        <?php if (!empty($message)): ?>
            <div class="alert alert-success"> <?= htmlspecialchars($message) ?> </div>
        <?php endif; ?>
        <form method="post">
            <div class="mb-3">
                <label for="main_content" class="form-label">Main Page HTML</label>
                <textarea id="main_content" name="main_content" class="form-control" rows="15"><?= htmlspecialchars($mainContent) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="dashboard.php" class="btn btn-secondary ms-2">Back to Dashboard</a>
        </form>
    </div>
</body>
</html>
