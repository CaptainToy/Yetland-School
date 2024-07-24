<?php
session_start();
require 'config/database.php';

if (isset($_POST['submit'])) {
    // Sanitize and validate form data
    $Firstname = filter_var($_POST['Firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $Middlename = filter_var($_POST['Middlename'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $Lastname = filter_var($_POST['Lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $Address = filter_var($_POST['Address'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $Gender = filter_var($_POST['Gender'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $Studentid = filter_var($_POST['StudentID'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $Class = filter_var($_POST['Class'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Validate form data
    $errors = [];
    if (!$Firstname) {
        $errors[] = 'Please enter your Firstname';
    }
    if (!$Middlename) {
        $errors[] = 'Please input your Middlename';
    }
    if (!$Lastname) {
        $errors[] = 'Please input a valid Lastname';
    }
    if (!$Address) {
        $errors[] = 'Please input an Address';
    }
    if (!$Gender) {
        $errors[] = 'Please input a Gender';
    }
    if (!$Studentid) {
        $errors[] = 'Please input a Student ID';
    }
    if (!$Class) {  
        $errors[] = 'Please input a Class';
    }

    if (empty($errors)) {
        // Check if Student ID already exists in the database
        $sql = "SELECT * FROM `allstudent` WHERE Studentid=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param('s', $Studentid);
        $stmt->execute();
        $result = $stmt->get_result();
        $_SESSION['signup-data'] = $_POST;
        
        if ($result->num_rows > 0) {
            $errors[] = 'Student already exists';
        } else {
            // Insert the new student into the database
            $insertQuery = "INSERT INTO allstudent (Firstname, Middlename, Lastname, Address, Gender, Studentid, Class) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $insertStmt = $connection->prepare($insertQuery);
            $insertStmt->bind_param('sssssss', $Firstname, $Middlename, $Lastname, $Address, $Gender, $Studentid, $Class);
            
            if ($insertStmt->execute()) {
                // Registration successful
                $_SESSION['signup-success'] = 'Registration successful';
                header('Location: ' . ROOT_URL . 'Student.php');
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
    header('Location: ' . ROOT_URL . 'addStudent.php');
    exit();
} else {
    // If form is not submitted, redirect to signup page
    header('Location: ' . ROOT_URL . 'addStudent.php');
    exit();
}
