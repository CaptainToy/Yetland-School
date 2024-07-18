<?php
require 'config/database.php';
// Ensure the user ID is set and sanitized
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    
    // Query to fetch the teacher
    $query = "SELECT * FROM teachers WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    
    // Check if the query was successful and if the teacher exists
    if ($result && mysqli_num_rows($result) > 0) {
        $teachers = mysqli_fetch_assoc($result);
    } else {
        // Handle case where the teacher is not found
        header('Location: ' . ROOT_URL . './admin/teacher.php');
        exit();
    }
} else {
    // Redirect if ID is not set
    header('Location: ' . ROOT_URL . './admin/teacher.php');
    exit();
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
            <form action="<?= ROOT_URL ?>./editTeacherLogic.php" enctype="multipart/form-data" method="post"> 
                <input type="hidden" name="id" value="<?= $id ?>"> 
                <input type="text" name="Staffid" value="<?= htmlspecialchars($teachers['Staffid']) ?>" placeholder="Staff Id">
                <input type="text" name="fullname" value="<?= htmlspecialchars($teachers['fullname']) ?>" placeholder="Full Name"> 
                <input type="text" name="email" value="<?= htmlspecialchars($teachers['email']) ?>" placeholder="Email">
                <select name="Role" id="Role">
                    <option value="">-- Edit Role --</option>
                    <option value="1" <?= $teachers['Role'] == 1 ? 'selected' : '' ?>>H.M</option>
                    <option value="2" <?= $teachers['Role'] == 2 ? 'selected' : '' ?>>Author</option>
                    <option value="3" <?= $teachers['Role'] == 3 ? 'selected' : '' ?>>Teacher</option>
                </select>

                <button type="submit" class="btn">Update Staff</button>
            </form>
        </div>
    </section>
</body>
</html>
