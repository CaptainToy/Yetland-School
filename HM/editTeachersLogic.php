<?php
// Include the header file which likely contains the database connection and other setup
include 'partials/header.php';

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Sanitize and store the form input values
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT); // Teacher ID
    $fullName = filter_var($_POST['fullName'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Full Name
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // Email Address
    $role = filter_var($_POST['role'], FILTER_SANITIZE_NUMBER_INT); // Role ID

    // Validate input
    if (!$email) {
        // Set session message if input is invalid
        $_SESSION['edit-user'] = 'Invalid form input on edit page';
    } else {
        // Update query to modify the teacher's information except StaffId
        $query = "UPDATE teachers SET fullName = ?, email = ?, role = ? WHERE id = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, 'ssii', $fullName, $email, $role, $id);
        $result = mysqli_stmt_execute($stmt);

        // Check for errors in the update query
        if ($result) {
            // Set session message if update is successful
            $_SESSION['edit-user-successful'] = "User $fullName ($email) updated successfully";
        } else {
            // Set session message if update fails
            $_SESSION['edit-user'] = "Failed to update user.";
        }
    }
    
    // Redirect to the teachers page after processing
    header('location:' . ROOT_URL . 'HM/Teacher.php');
    die();
}
?>
