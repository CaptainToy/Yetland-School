<?php
// Include the header file which likely contains the database connection and other setup
include 'partials/header.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and store the form input values
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $feeStatus = filter_var($_POST['feeStatus'], FILTER_SANITIZE_STRING);
    $amountPaid = filter_var($_POST['amountPaid'], FILTER_SANITIZE_STRING);

    // Validate input
    if (!$feeStatus || !$amountPaid) {
        // Set session message if input is invalid
        $_SESSION['edit-user'] = 'Invalid form input on edit page';
    } else {
        // Update query to modify the student's information
        $stmt = $connection->prepare("UPDATE allstudent SET feeStatus = ?, amountPaid = ? WHERE id = ?");
        $stmt->bind_param("ssi", $feeStatus, $amountPaid, $id);

        // Execute the update query and check for errors
        if ($stmt->execute()) {
            // Set session message if update is successful
            $_SESSION['edit-user-successful'] = "User $id updated successfully";
        } else {
            // Set session message if update fails
            $_SESSION['edit-user'] = "Failed to update user.";
        }

        $stmt->close();
    }

    // Redirect to the School-fee page after processing
    header('location:' . ROOT_URL . 'admin/School-fee.php');
    die();
}

