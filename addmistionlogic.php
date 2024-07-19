<?php
session_start();
require 'config/database.php';

// Error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    // Sanitize and validate form data
    $Firstname = trim($_POST['fname']);
    $Lastname = trim($_POST['lname']);
    $Gender = $_POST['gender'];
    $Age = trim($_POST['age']);
    $DOB = $_POST['dob'];
    $Address = trim($_POST['address']);
    
    // File upload handling
    $Picture = $_FILES['myfile']['name'];
    $PictureTmpName = $_FILES['myfile']['tmp_name'];
    $PictureSize = $_FILES['myfile']['size'];
    $PictureError = $_FILES['myfile']['error'];
    $PictureType = $_FILES['myfile']['type'];

    // Validate form data
    $errors = [];
    if (!$Firstname) {
        $errors[] = 'Please enter your first name';
    }
    if (!$Lastname) {
        $errors[] = 'Please enter your last name';
    }
    
    // Gender check
    if ($Gender !== 'Male' && $Gender !== 'Female') {
        $errors[] = 'Please select a valid gender';
    }
    
    if (!$Age || !is_numeric($Age)) {
        $errors[] = 'Please enter a valid age';
    }
    if (!$DOB) {
        $errors[] = 'Please enter your date of birth';
    } else {
        // Convert DOB to dd/mm/yyyy format
        $date = DateTime::createFromFormat('Y-m-d', $DOB);
        if ($date) {
            $DOB = $date->format('m/d/Y');
        } else {
            $errors[] = 'Invalid date format';
        }
    }
    if (!$Address) {
        $errors[] = 'Please enter your address';
    }
    if ($PictureError === 0) {
        $PictureExt = strtolower(pathinfo($Picture, PATHINFO_EXTENSION));
        $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($PictureExt, $allowedExt)) {
            $errors[] = 'Invalid file type for the picture';
        } elseif ($PictureSize > 100000000) { // 100MB
            $errors[] = 'Picture size exceeds the limit of 100MB';
        } else {
            $PictureNewName = uniqid('', true) . "." . $PictureExt;
            $PictureDestination = './GenIMG' . $PictureNewName;
            move_uploaded_file($PictureTmpName, $PictureDestination);
        }
    } else {
        $errors[] = 'Error uploading the picture';
    }

    // If there are no errors, proceed with registration
    if (empty($errors)) {
        // Check if the student already exists in the database
        $sql = "SELECT * FROM `studentapplication` WHERE Firstname=? AND Lastname=?";
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
