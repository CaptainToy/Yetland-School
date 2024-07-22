<?php 
require './Config/constant.php';

// session_start();

// Initialize variables with null if not set
$Staffid = $_SESSION['signup-data']['Staffid'] ?? '';
$fullName = $_SESSION['signup-data']['FullName'] ?? '';
$Email = $_SESSION['signup-data']['Email'] ?? '';
$Role = $_SESSION['signup-data']['Role'] ?? '';
$Post = $_SESSION['signup-data']['Post'] ?? '';
$Class = $_SESSION['signup-data']['Class'] ?? '';
$Password = $_SESSION['signup-data']['Createpassword'] ?? '';
$Confirmpassword = $_SESSION['signup-data']['Confirmpassword'] ?? '';

// Clear signup-data session
unset($_SESSION['signup-data']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./signUp.css">
    <title>Staff Registration Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Staff Registration Form</h2>
        <?php if (isset($_SESSION['signup-error'])): ?>
            <h1 style="color:red;"></h1>
            <div class="error-container">
                <?= htmlspecialchars($_SESSION['signup-error']) ?>
            </div>
        <?php unset($_SESSION['signup-error']); endif; ?>
        
        <form action="<?= htmlspecialchars(ROOT_URL . 'AddTeachersLogic.php') ?>" enctype="multipart/form-data" method="post">
            <div class="form-row">
                <div class="form-group">
                    <label for="staff-id">Staff ID:</label>
                    <input type="text" id="staff-id" name="Staffid" value="<?= htmlspecialchars($Staffid) ?>" required>
                </div>
                <div class="form-group">
                    <label for="full-name">Full Name:</label>
                    <input type="text" id="full-name" name="fullname" value="<?= htmlspecialchars($fullName) ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="Email" value="<?= htmlspecialchars($Email) ?>" required>
                </div>
                <div class="form-group">
                    <label for="role">Role:</label>
                    <select id="role" name="role" required>
                        <option value="0" <?= $Role == 'HM' ? 'selected' : '' ?>>HM</option>
                        <option value="1" <?= $Role == 'Author' ? 'selected' : '' ?>>Author</option>
                        <option value="2" <?= $Role == 'Teachers' ? 'selected' : '' ?>>Teachers</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="post">Post:</label>
                    <input type="text" id="post" name="Post" value="<?= htmlspecialchars($Post) ?>" required>
                </div>
                <div class="form-group">
                    <label for="class">Class:</label>
                    <input type="text" id="class" name="Class" value="<?= htmlspecialchars($Class) ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" value="<?= htmlspecialchars($Password) ?>" required>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password:</label>
                    <input type="password" id="confirm-password" name="Confirmpassword" value="<?= htmlspecialchars($Confirmpassword) ?>" required>
                </div>
            </div>
            <button type="submit" name="submit" class="btn">Sign Up</button>
        </form>
    </div>
</body>
</html>
