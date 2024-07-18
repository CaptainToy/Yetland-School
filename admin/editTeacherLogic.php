<?php
// Include the header file which likely contains the database connection and other setup
include 'partials/header.php';

// Query to select all teachers
$query = "SELECT * FROM teachers";
$result = mysqli_query($connection, $query);

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Sanitize and store the form input values
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT); // Teacher ID
    $Staffid = filter_var($_POST['Staffid'], FILTER_SANITIZE_NUMBER_INT); // Staff ID
    $fullname = filter_var($_POST['fullname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Full Name
    $Email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL); // Email Address
    $Role = filter_var($_POST['Role'], FILTER_SANITIZE_NUMBER_INT); // Role ID

    // Validate input
    if (!$Staffid || !$Email) {
        // Set session message if input is invalid
        $_SESSION['edit-user'] = 'Invalid form input on edit page';
    } else {
        // Update query to modify the teacher's information
        $query = "UPDATE teachers SET Staffid = '$Staffid', fullname = '$fullname', Email = '$Email', Role = '$Role' WHERE id=$id"; // Ensure string values are in quotes
        $result = mysqli_query($connection, $query);

        // Check for errors in the update query
        if (mysqli_errno($connection)) {
            // Set session message if update fails
            $_SESSION['edit-user'] = "Failed to update user.";
        } else {
            // Set session message if update is successful
            $_SESSION['edit-user-successful'] = "User $fullname ($Email) updated successfully";
        }
    }
    
    // Redirect to the teachers page after processing
    header('location:' . ROOT_URL . 'Admin/teacher.php');
    die();
}
?>
