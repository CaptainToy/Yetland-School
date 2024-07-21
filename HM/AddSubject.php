<?php

require 'config/constant.php'; // Assuming this file contains necessary constants like ROOT_URL

// Retrieving username/email and password from session data
$Code = $_SESSION['signup-data']['Code'] ?? '';
$Subject = $_SESSION['signup-data']['Subject'] ?? '';

// Unset signup data from session to avoid redundancy
unset($_SESSION['signup-data']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/css/edit.css">
    <title>Add Subject</title>
</head>
<body class="back">
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Add Subject</h2>
            <div class="error_message success">
                <p id="error"></p>
                <?php if(isset($_SESSION['signup-error'])): ?>
                <div class="alert-message">
                    <?php
                    // Displaying any signup errors
                    $errors = explode(', ', $_SESSION['signup-error']);
                    foreach ($errors as $error) {
                        echo '<p>' . htmlspecialchars($error) . '</p>'; // Escape HTML output
                    }
                    unset($_SESSION['signup-error']);
                    ?>
                </div>
                <?php endif; ?>
            </div>
            <form action="<?= ROOT_URL ?>HM/AddSubjectLogic.php" method="post" enctype="multipart/form-data">
                <input type="text" id="Code" name="Code" value="<?= htmlspecialchars($Code) ?>" placeholder="Code" required>
                <input type="text" id="Subject" name="Subject" value="<?= htmlspecialchars($Subject) ?>" placeholder="Subject" required>
                <button type="submit" name="submit" class="btn">Add Subject</button>
            </form>
        </div>
    </section>
</body>
</html>
