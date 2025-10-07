<?php

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

session_start();

$response = array();

try {
    // Check if the user is already logged in
    if (isset($_SESSION['user_id'])) {
        $response['status'] = 'error';
        $response['message'] = 'You are already logged in';
        echo json_encode($response);
        exit();
    }

    // Check if all required POST data exists
    $required_fields = ['name', 'email', 'password', 'phone_number', 'country', 'city', 'role'];
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            $response['status'] = 'error';
            $response['message'] = ucfirst($field) . ' is required';
            echo json_encode($response);
            exit();
        }
    }

    require_once '../controllers/user_controller.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $role = $_POST['role'];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['status'] = 'error';
        $response['message'] = 'Invalid email format';
        echo json_encode($response);
        exit();
    }

    // Check if email already exists
    $existing_user = get_user_by_email_ctr($email);
    if ($existing_user) {
        $response['status'] = 'error';
        $response['message'] = 'Email already exists';
        echo json_encode($response);
        exit();
    }


    $user_id = register_user_ctr($name, $email, $password, $phone_number, $country, $city, $role);

    if ($user_id) {
        $response['status'] = 'success';
        $response['message'] = 'Registration successful! Please login to continue.';
        $response['id'] = $user_id;
    } else {
        // Try to get the last MySQL error from the User class
        $mysql_error = '';
        if (class_exists('User')) {
            $user = new User();
            if ($user->db && $user->db->error) {
                $mysql_error = $user->db->error;
            }
        }
        $response['status'] = 'error';
        $response['message'] = 'Failed to register. ' . ($mysql_error ? 'MySQL error: ' . $mysql_error : 'Please try again.');
    }

} catch (Exception $e) {
    $response['status'] = 'error';
    $response['message'] = 'Server error: ' . $e->getMessage();
}

echo json_encode($response);

?>