<?php
require 'config/database.php'; // Include database configuration file
session_start();

if (isset($_POST['submit'])) {
    // Sanitize and retrieve form data
    $Email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
    $Password = filter_var($_POST['Password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Check if email or password is missing
    if (empty($Email) || empty($Password)) {
        $_SESSION['signin'] = 'Email and password are required.';
        header('Location: ' . ROOT_URL . '');
        exit();
    }

    // Prepare SQL query to fetch user data
    $fetch_user_query = "SELECT id, Password, Role FROM teachers WHERE Email = ?";
    $stmt = mysqli_prepare($connection, $fetch_user_query);
    mysqli_stmt_bind_param($stmt, "s", $Email);
    mysqli_stmt_execute($stmt);
    $fetch_user_result = mysqli_stmt_get_result($stmt);

    // Check if user is found
    if ($fetch_user_result && mysqli_num_rows($fetch_user_result) == 1) {
        // Fetch user record
        $user_record = mysqli_fetch_assoc($fetch_user_result);
        $db_password = $user_record['Password'];

        // Verify password
        if (password_verify($Password, $db_password)) {
            // Set user ID in session
            $_SESSION['user-id'] = $user_record['id'];
            
            // Role-based redirection using switch statement
            switch ($user_record['Role']) {
                case 0:
                    $_SESSION['user-admin'] = true;
                    header('Location: ' . ROOT_URL . 'admin/teacher.php'); // Redirect admin to manage user page
                    break;
                case 1:
                    $_SESSION['user-admin'] = true;
                    header('Location: ' . ROOT_URL . 'HM/Teacher.php'); // Redirect HM to manage user page
                    break; 
                default:
                $_SESSION['user-admin'] = true;
                header('Location: ' . ROOT_URL . 'teachers/Class.php'); // Redirect teachers to class page
                break;                
            }
            exit();
        } else {
            // Incorrect password
            $_SESSION['signin'] = 'Incorrect password.';
        }
    } else {
        // User not found
        $_SESSION['signin'] = 'User not found.';
    }

    // Store form data in session and redirect to login page
    $_SESSION['signin-data'] = $_POST;
    header('Location: ' . ROOT_URL . 'login.php');
    exit();
} else {
    // Redirect to login page if form is not submitted
    header('Location: ' . ROOT_URL . 'AddTeachers.php');
    exit();
}
