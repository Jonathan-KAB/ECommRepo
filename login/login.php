<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SeamLink Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link href="../login-register.css" rel="stylesheet">
</head>

<body>
        <div class="login-main">
            <div class="login-card">
                <h2>Login to your account</h2>
                <form method="POST" action="../actions/login_user_action.php" id="login-form" style="width:100%;">
                    <div class="input-field">
                        <input type="email" id="email" name="email" required placeholder=" ">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" id="password" name="password" required placeholder=" ">
                        <label for="password">Password</label>
                    </div>
                    <button type="submit" class="btn">Login</button>
                    <div class="bottom-link">
                        Don't have an account? <a href="register.php">Register here</a>.
                    </div>
                </form>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/login.js"></script>

    
</body>

</html>