<?php
// session_start();
require 'config/database.php';

// Error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    // Sanitize and validate form data
    $Code = filter_var($_POST['Code'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $Subject = filter_var($_POST['Subject'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Validate form data
    $errors = [];
    if (!$Code) {
        $errors[] = 'Please enter Subject Code';
    }
    if (!$Subject) {
        $errors[] = 'Please input Subject';
    }

    if (empty($errors)) {
        // Check if the subject code already exists in the database
        $sql = "SELECT * FROM `subject` WHERE Code=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param('s', $Code);
        $stmt->execute();
        $result = $stmt->get_result();
        $_SESSION['signup-data'] = $_POST;

        if ($result->num_rows > 0) {
            $errors[] = 'Subject code already exists in the database';
        } else {
            // Insert the new subject into the database
            $insertQuery = "INSERT INTO subject (Code, Subject) VALUES (?, ?)";
            $insertStmt = $connection->prepare($insertQuery);
            $insertStmt->bind_param('ss', $Code, $Subject);

            if ($insertStmt->execute()) {
                // Registration successful
                $_SESSION['signup-success'] = 'Registration successful';
                header('Location: ' . ROOT_URL . 'HM/subject.php');
                exit();
            } else {
                // Log the error
                error_log("Error executing query: " . $insertStmt->error);
                $errors[] = 'Failed to register subject';
            }
        }
    }

    // Set error messages in session
    $_SESSION['signup-error'] = implode(', ', $errors);

    // Display error message and make it disappear
    echo ('<div id="error-message" style="color: red; font-weight: bold; font-size: 20px; margin: 20px;">
    Error: ' . $_SESSION['signup-error'] . ' This message will disappear in <span id="countdown">5</span> seconds.
</div>

<script>
    var countdownElement = document.getElementById("countdown");
    var countdown = 5;

    function updateCountdown() {
        countdown--;
        if (countdown >= 0) {
            countdownElement.innerText = countdown;
            setTimeout(updateCountdown, 1000);
        } else {
            window.location.href = "./AddSubject.php";
        }
    }

    setTimeout(updateCountdown, 1000);
</script>');

    exit();
} else {
// If form is not submitted, display the error message and make it disappear
echo ('<div id="error-message" style="color: red; font-weight: bold; font-size: 20px; margin: 20px;">
    Error submitting: This message will disappear in <span id="countdown">5</span> seconds.
</div>

<script>
    var countdownElement = document.getElementById("countdown");
    var countdown = 5;

    function updateCountdown() {
        countdown--;
        if (countdown >= 0) {
            countdownElement.innerText = countdown;
            setTimeout(updateCountdown, 1000);
        } else {
            window.location.href = "./AddSubject.php";
        }
    }

    setTimeout(updateCountdown, 1000);
</script>');
}
?>
<style>
    body {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f8f9fa;
    }
    #error-message {
        color: #721c24;
        background-color: #f8d7da;
        border: 1px solid #f5c6cb;
        padding: 20px;
        border-radius: 5px;
        font-weight: bold;
        font-size: 18px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    #countdown {
        font-size: 22px;
        font-weight: bold;
    }
</style>
