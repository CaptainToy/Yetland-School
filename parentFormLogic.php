<?php
session_start();
require 'config/database.php'; // Adjust this path as per your file structure

// Error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    // Sanitize and validate form data
    $Father = trim($_POST['Father']);
    $FatherNumber = trim($_POST['FatherNumber']);
    $Mother = trim($_POST['Mother']);
    $MothersNumber = trim($_POST['MothersNumber']);
    $Email = trim($_POST['Email']);
    $Religion = trim($_POST['Religion']);
    $Address = trim($_POST['Address']);

    // Validate form data
    $errors = [];
    if (empty($Father)) {
        $errors[] = 'Please enter father\'s name';
    }
    if (empty($FatherNumber)) {
        $errors[] = 'Please enter father\'s phone number';
    }
    if (empty($Mother)) {
        $errors[] = 'Please enter mother\'s name';
    }
    if (empty($MothersNumber)) {
        $errors[] = 'Please enter mother\'s phone number';
    }
    if (empty($Email)) {
        $errors[] = 'Please enter your Email';
    }
    if (empty($Religion)) {
        $errors[] = 'Please enter your Religion';
    }
    if (empty($Address)) {
        $errors[] = 'Please enter your Address';
    }

    // If there are no errors, proceed with registration
    if (empty($errors)) {
        // Check if the parent already exists in the database
        $sql = "SELECT * FROM parentinfo WHERE Father=? AND Mother=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param('ss', $Father, $Mother);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $errors[] = 'Parent information already exists';
        } else {
            // Insert the new parent information into the database
            $insertQuery = "INSERT INTO parentinfo (Father, FatherNumber, Mother, MothersNumber, Email, Religion, Address) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $insertStmt = $connection->prepare($insertQuery);
            $insertStmt->bind_param('sssssss', $Father, $FatherNumber, $Mother, $MothersNumber, $Email, $Religion, $Address);

            if ($insertStmt->execute()) {
                // Registration successful
                $_SESSION['signup-success'] = 'Registration successful';
                header('Location: ' . ROOT_URL . 'madicalForm.php');
                exit();
            } else {
                // Log the error
                error_log("Error executing query: " . $insertStmt->error);
                $errors[] = 'Failed to register parent information';
            }
        }
    }

    // Set error messages in session
    $_SESSION['signup-error'] = implode(', ', $errors);

    // Redirect back to signup page
    header('Location: ' . ROOT_URL . 'parentinfo.php');
    exit();
} else {
    // If form is not submitted, redirect to signup page
    header('Location: ' . ROOT_URL . 'parentinfo.php');
    exit();
}
?>
