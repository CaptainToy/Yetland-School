<?php
require 'config/database.php';

// Error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    // Sanitize and validate form data
    $BOG = trim($_POST['BOG']);
    $Condition = trim($_POST['Condition']);
    $Immun = $_POST['Immun'];
    $EmgContact = trim($_POST['EmgContact']);
    $Consent = trim($_POST['Consent']);

    // File upload handling
    $MedPic = $_FILES['MedPic']['name'];
    $MedPicTmpName = $_FILES['MedPic']['tmp_name'];
    $MedPicSize = $_FILES['MedPic']['size'];
    $MedPicError = $_FILES['MedPic']['error'];
    $MedPicType = $_FILES['MedPic']['type'];

    // Validate form data
    $errors = [];
    if (!$BOG) {
        $errors[] = 'Please enter BOG';
    }
    if (!$Condition) {
        $errors[] = 'Please enter Condition';
    }
    if ($Immun !== 'Yes' && $Immun !== 'No') {
        $errors[] = 'Please select a valid immunization status';
    }
    if (!$EmgContact) {
        $errors[] = 'Please enter your emergency contact';
    }
    if ($Consent !== '1') {
        $errors[] = 'Please select a valid consent option';
    }

    // Validate file upload
    if ($MedPicError === 0) {
        $MedPicExt = strtolower(pathinfo($MedPic, PATHINFO_EXTENSION));
        $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($MedPicExt, $allowedExt)) {
            $errors[] = 'Invalid file type for the picture';
        } elseif ($MedPicSize > 100000) { // 100KB
            $errors[] = 'Picture size exceeds the limit of 100KB';
        } else {
            $MedPicNewName = uniqid('', true) . "." . $MedPicExt;
            $MedPicDestination = './GenIMG/' . $MedPicNewName;
            move_uploaded_file($MedPicTmpName, $MedPicDestination);
        }
    } else {
        $errors[] = 'Error uploading the picture';
    }

    // If there are no errors, proceed with registration
    if (empty($errors)) {
        // Check if the student already exists in the database
        $sql = "SELECT * FROM `medicalreport` WHERE MedPic = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param('s', $MedPic);
        $stmt->execute();
        $result = $stmt->get_result();
        $_SESSION['signup-data'] = $_POST;

        if ($result->num_rows > 0) {
            $errors[] = 'Student already exists';
        } else {
            // Insert the new student into the database
            $insertQuery = "INSERT INTO `medicalreport` (`BOG`, `Condition`, `Immun`, `EmgContact`, `MedPic`, `Consent`) VALUES (?, ?, ?, ?, ?, ?)";
            $insertStmt = $connection->prepare($insertQuery);
            $insertStmt->bind_param('ssssss', $BOG, $Condition, $Immun, $EmgContact, $MedPicNewName, $Consent);

            if ($insertStmt->execute()) {
                // Registration successful
                $_SESSION['signup-success'] = 'Registration successful';
                header('Location: ' . ROOT_URL . 'letterOfUndertaking.php');
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
    // header('Location: ' . ROOT_URL . 'medicalForm.php');
    echo (' <div style="border: 1px solid #f44336; background-color: #ffebee; color: #f44336; padding: 15px; border-radius: 5px; max-width: 400px; margin: 20px auto; font-family: Arial, sans-serif; text-align: center;">
        <strong>Error:</strong> There was an issue processing your request. Please try again later.
    </div>');
    exit();
} else {
    // If form is not submitted, redirect to signup page
    // header('Location: ' . ROOT_URL . 'medicalForm.php');
    echo (' <div style="border: 1px solid #f44336; background-color: #ffebee; color: #f44336; padding: 15px; border-radius: 5px; max-width: 400px; margin: 20px auto; font-family: Arial, sans-serif; text-align: center;">
        <strong>Error:</strong> There was an issue processing your request. Please try again later.
    </div>');

    exit();
}
