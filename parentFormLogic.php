<?php
session_start();
require 'config/database.php';

// Error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    // Sanitize and validate form data
 
    // 
    $Father = trim($_POST['Father']);
    $FatherNumber = trim($_POST['FatherNumber']);
    $Mother = $_POST['Mother'];
    $MothersNumber = trim($_POST['MothersNumber']);
    $Email = $_POST['Email'];
    $Religion = trim($_POST['Religion']);
    $Address = trim($_POST['Address']);

    
    // File upload handling
 

    // Validate form data
    $errors = [];
    if (!$Father) {
        $errors[] = 'Please enter your  name';
    }
    if (!$FatherNumber) {
        $errors[] = 'Please enter your number';
    }
    if (!$Mother) {
        $errors[] = 'Please enter your name';
    }
    if (!$MothersNumber) {
        $errors[] = 'Please enter your number';
    }
    if (!$Email) {
        $errors[] = 'Please enter your Email';
    }
    
    // Gender check
    if ($Religion !== 'Christain' && $Gender !== 'Muilsim') {
        $errors[] = 'Please select a valid gender';
    }
    if (!$Address) {
        $errors[] = 'Please enter your Address';
    }
    
}

    // If there are no errors, proceed with registration
    if (empty($errors)) {
        // Check if the student already exists in the database

        $sql = "SELECT * FROM `parentinfo`WHERE Firstname=? AND Lastname=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param('ss', $Firstname, $Lastname);
        $stmt->execute();
        $result = $stmt->get_result();
        $_SESSION['signup-data'] = $_POST;

        if ($result->num_rows > 0) {
            $errors[] = 'Student already exists';
        } else {
            // Insert the new student into the database
            $insertQuery = "INSERT INTO studentapplication (Firstname, Lastname, Gender, Age, DOB, Address, Picture) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $insertStmt = $connection->prepare($insertQuery);
            $insertStmt->bind_param('sssssss', $Firstname, $Lastname, $Gender, $Age, $DOB, $Address, $PictureNewName);

            if ($insertStmt->execute()) {
                // Registration successful
                $_SESSION['signup-success'] = 'Registration successful';
                header('Location: ' . ROOT_URL . 'parentinfo.php');
                exit();
            } else {
                // Log the error
                error_log("Error executing query: " . $insertStmt->error);
                $errors[] = 'Failed to register student';
            }
        }
    }

    // Set error messages in session
    $_SESSION['signup-error'] = implode(', ', $errors);

    // Redirect back to signup page
    header('Location: ' . ROOT_URL . 'AdmissionForm.php');
    exit();
} else {
    // If form is not submitted, redirect to signup page
    header('Location: ' . ROOT_URL . 'AdmissionForm.php');
    exit();
}
?>
