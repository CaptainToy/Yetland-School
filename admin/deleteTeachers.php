<?php
require 'config/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Check if the ID is valid
    if ($id) {
        // Fetch teacher from database
        $query = 'SELECT * FROM teachers WHERE id = ?';
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) == 1) {
            $teacher = mysqli_fetch_assoc($result);

            // Delete user from database
            $delete_user_query = 'DELETE FROM teachers WHERE id = ?';
            $delete_stmt = mysqli_prepare($connection, $delete_user_query);
            mysqli_stmt_bind_param($delete_stmt, 'i', $id);
            mysqli_stmt_execute($delete_stmt);

            if (mysqli_stmt_affected_rows($delete_stmt) > 0) {
                $_SESSION["delete-user-success"] = "User {$teacher['StaffId']} deleted successfully.";
            } else {
                $_SESSION["delete-user"] = "Couldn't delete {$teacher['StaffId']} from the database.";
            }

            mysqli_stmt_close($delete_stmt);
        } else {
            $_SESSION["delete-user"] = "Teacher not found.";
        }

        mysqli_stmt_close($stmt);
    } else {
        $_SESSION["delete-user"] = "Invalid ID.";
    }
} else {
    $_SESSION["delete-user"] = "ID not set.";
}

header("Location: " . ROOT_URL . 'admin/teacher.php');
exit();
?>
