<?php
require 'config/constant.php'; // Assuming this file contains necessary constants like ROOT_URL

// Retrieving username/email and password from session data
$Email = $_SESSION['signup-data']['Email'] ?? '';
$Password = $_SESSION['signup-data']['Password'] ?? '';

// Unset signup data from session to avoid redundancy
unset($_SESSION['signup-data']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/form.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="img-container"><img src="./assets/img/yetland/logo-removebg-preview.png" alt="logo"></div>
        <div class="content-container">
            <div class="error_message success">
                <p id="error"></p>
                <?php if(isset($_SESSION['signUp'])): ?>
                <div class="alert-message">
                    <?php
                    // Displaying any signup errors
                    $errors = explode('<br>', $_SESSION['signUp']);
                    foreach ($errors as $error) {
                        echo '<p>' . htmlspecialchars($error) . '</p>'; // Escape HTML output
                    }
                    unset($_SESSION['signUp']);
                    ?>
                </div>
                <?php endif; ?>
            </div>
            <form action="<?= ROOT_URL ?>loginLogic.php" method="post" id="loginForm">
                <div class="email-container">
                    <input type="text" id="email" name="Email" value="<?= htmlspecialchars($Email) ?>" placeholder="Email" required>
                </div>
                <div class="email-container">
                    <input type="password" id="pass" name="Password" value="<?= htmlspecialchars($Password) ?>" placeholder="Password" required>
                </div>
                <div class="from-control">
                    <a href="./AddTeachers.php"><small>Need Help?</small></a>
                </div>
                <div class="btn-container">
                    <button type="submit" name="submit" class="btn">Login</button>
                </div>
            </form>
        </div>
    </div>
    <style>
        .alert-message {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .alert-message p {
            margin: 0;
        }
    </style>
</body>
</html>
