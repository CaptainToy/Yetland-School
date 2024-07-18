<?php
session_start();
require 'config/database.php';

// Error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    // Sanitize and validate form data
    $staffId = filter_var($_POST['Staffid'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fullName = filter_var($_POST['fullname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
    $role = filter_var($_POST['role'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $post = filter_var($_POST['Post'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $class = filter_var($_POST['Class'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmPassword = filter_var($_POST['Confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Validate form data
    $errors = [];
    if (!$staffId) {
        $errors[] = 'Please enter your staff ID';
    }
    if (!$fullName) {
        $errors[] = 'Please input your full name';
    }
    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please input a valid email';
    }
    if (!$role) {
        $errors[] = 'Please input a role';
    }
    if (!$post) {
        $errors[] = 'Please input a post';
    }
    if (!$class) {
        $errors[] = 'Please input a class';
    }
    if (strlen($password) < 8) {
        $errors[] = 'Password should be 8 or more characters';
    }
    if ($password !== $confirmPassword) {
        $errors[] = 'Passwords do not match';
    }

    // If there are no errors, proceed with registration
    if (empty($errors)) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Check if email or username already exists in the database
        $sql = "SELECT * FROM `teachers` WHERE fullName=? OR email=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param('ss', $fullName, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $_SESSION['signup-data'] = $_POST;
        
        if ($result->num_rows > 0) {
            $errors[] = 'Username or email already exists';
        } else {
            // Insert the new user into the database
            $insertQuery = "INSERT INTO teachers (Staffid, fullName, Email, Role, Post, Class, Password) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $insertStmt = $connection->prepare($insertQuery);
            $insertStmt->bind_param('sssssss', $staffId, $fullName, $email, $role, $post, $class, $hashedPassword);
            
            if ($insertStmt->execute()) {
                // Registration successful
                $_SESSION['signup-success'] = 'Registration successful';
                header('Location: ' . ROOT_URL . 'login.php');
                exit();
            } else {
                // Log the error
                error_log("Error executing query: " . $insertStmt->error);
                $errors[] = 'Failed to register user';
            }
        }
    }

    // Set error messages in session
    $_SESSION['signup-error'] = implode(', ', $errors);

    // Redirect back to signup page
    header('Location: ' . ROOT_URL . 'login.php');
    exit();
} else {
    // If form is not submitted, redirect to signup page
    header('Location: ' . ROOT_URL . 'index.php');
    exit();
}
