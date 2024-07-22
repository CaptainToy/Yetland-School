<?php
require 'config/database.php';

// Function to redirect to the teacher admin page
function redirectToTeacherAdmin() {
    header('Location: ' . ROOT_URL . './admin/teacher.php');
    exit();
}

// Ensure the user ID is set and sanitized
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Query to fetch the teacher
    $query = "SELECT * FROM teachers WHERE id = ?";
    if ($stmt = mysqli_prepare($connection, $query)) {
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Check if the query was successful and if the teacher exists
        if ($result && mysqli_num_rows($result) > 0) {
            $teacher = mysqli_fetch_assoc($result);
        } else {
            // Handle case where the teacher is not found
            redirectToTeacherAdmin();
        }

        mysqli_stmt_close($stmt); // Close the prepared statement
    } else {
        // Handle query preparation failure
        error_log('Query preparation failed: ' . mysqli_error($connection));
        redirectToTeacherAdmin();
    }
} else {
    // Redirect if ID is not set
    redirectToTeacherAdmin();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/edit.css">
    <title>Edit Teachers</title>
</head>
<body class="back">
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Edit Teachers</h2>
            <form action="<?= ROOT_URL ?>admin/editTeacherLogic.php" method="post" id="loginForm">
                <input type="hidden" name="id" value="<?= $id ?>"> 
                <input type="text" name="StaffId" value="<?= htmlspecialchars($teacher['StaffId']) ?>" placeholder="Staff Id" readonly>
                <input type="text" name="fullName" value="<?= htmlspecialchars($teacher['fullName']) ?>" placeholder="Full Name"> 
                <input type="text" name="email" value="<?= htmlspecialchars($teacher['email']) ?>" placeholder="Email">
                <select name="role" id="role">
                    <option value="">-- Edit role --</option>
                    <option value="0" <?= $teacher['role'] == 1 ? 'selected' : '' ?>>Admin</option>
                    <option value="1" <?= $teacher['role'] == 1 ? 'selected' : '' ?>>H.M</option>
                    <option value="2" <?= $teacher['role'] == 2 ? 'selected' : '' ?>>Author</option>
                    <option value="3" <?= $teacher['role'] == 3 ? 'selected' : '' ?>>Teacher</option>
                </select>

                <button type="submit" name="submit" class="btn">Update Staff</button>
            </form>
        </div>
    </section>
</body>
</html>
