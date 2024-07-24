<?php
// Include the header file which likely contains the database connection and other setup
include 'partials/header.php';

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Sanitize and store the form input values
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT); // Subject ID
    $code = filter_var($_POST['Code'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Code
    $subject = filter_var($_POST['Subject'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Subject

    // Validate input
    if (!$code || !$subject) {
        // Set session message if input is invalid
        $_SESSION['edit-subject'] = 'Invalid form input on edit page';
    } else {
        // Update query to modify the subject information
        $query = "UPDATE `subject` SET `Code` = ?, `Subject` = ? WHERE `id` = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, 'ssi', $code, $subject, $id);
        $result = mysqli_stmt_execute($stmt);

        // Check for errors in the update query
        if ($result) {
            // Set session message if update is successful
            $_SESSION['edit-subject-successful'] = "Subject $code ($subject) updated successfully";
        } else {
            // Set session message if update fails
            $_SESSION['edit-subject'] = "Failed to update subject.";
        }
    }
    
    // Redirect to the subjects page after processing
    header('Location: ' . ROOT_URL . 'HM/subject.php');
    die();
}
?>
