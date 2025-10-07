<?php

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

session_start();

$response = array();

try {
    // Check if already logged in
    if (isset($_SESSION['user_id'])) {
        $response['status'] = 'error';
        $response['message'] = 'You are already logged in';
        echo json_encode($response);
        exit();
    }

    // Check if POST data exists
    if (!isset($_POST['email']) || !isset($_POST['password'])) {
        $response['status'] = 'error';
        $response['message'] = 'Email and password are required';
        echo json_encode($response);
        exit();
    }

    require_once '../controllers/user_controller.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if user exists
    $existing_user = get_user_by_email_ctr($email);
    if (!$existing_user) {
        $response['status'] = 'error';
        $response['message'] = 'No account found with this email address';
        echo json_encode($response);
        exit();
    }

    // Verify password
    if (password_verify($password, $existing_user['password'])) {
        $_SESSION['user_id'] = $existing_user['id'];
        $_SESSION['user_name'] = $existing_user['name'];
        $_SESSION['user_email'] = $existing_user['email'];
        $_SESSION['user_role'] = $existing_user['role'];

        $response['status'] = 'success';
        $response['message'] = 'Login successful';
        
        // Redirect based on role
        if ($existing_user['role'] == 2) {
            $response['redirect'] = '../admin/dashboard.php'; // Admin dashboard
        } else {
            $response['redirect'] = '../dashboard.php'; // Regular user dashboard
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Invalid password';
    }

} catch (Exception $e) {
    $response['status'] = 'error';
    $response['message'] = 'Server error: ' . $e->getMessage();
}

echo json_encode($response);

?>