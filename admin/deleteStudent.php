<?php
require 'config/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Check if the ID is valid
    if ($id) {
        // Fetch teacher from database
        $query = 'SELECT * FROM allstudent WHERE id = ?';
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) == 1) {
            $teacher = mysqli_fetch_assoc($result);

            // Delete user from database
            $delete_user_query = 'DELETE FROM allstudent WHERE id = ?';
            $delete_stmt = mysqli_prepare($connection, $delete_user_query);
            mysqli_stmt_bind_param($delete_stmt, 'i', $id);
            mysqli_stmt_execute($delete_stmt);

            if (mysqli_stmt_affected_rows($delete_stmt) > 0) {
                $_SESSION["delete-user-success"] = "User deleted successfully.";
            } else {
                $_SESSION["delete-user"] = "Couldn't delete from the database.";
            }

            mysqli_stmt_close($delete_stmt);
        } else {
            $_SESSION["delete-user"] = "Student not found.";
        }

        mysqli_stmt_close($stmt);
    } else {
        $_SESSION["delete-user"] = "Invalid ID.";
    }
} else {
    $_SESSION["delete-user"] = "ID not set.";
}


// Function to handle the countdown and redirect
function countdownAndRedirect($seconds, $url) {
    echo "<div style='text-align: center; margin-top: 20%;'>";
    echo "<h2 style='color: green;'>Action was successful!</h2>";
    echo "<p>You will be redirected in <span id='countdown'>$seconds</span> seconds...</p>";
    echo "</div>";

    // Inline JavaScript for countdown and redirect
    echo "
    <script type='text/javascript'>
        var seconds = $seconds;
        var countdown = document.getElementById('countdown');
        setInterval(function() {
            seconds--;
            countdown.textContent = seconds;
            if (seconds <= 0) {
                window.location.href = '$url';
            }
        }, 1000);
    </script>
    ";
}

// Call the function with a 3-second countdown and redirect URL
countdownAndRedirect(3, 'allStudent.php');
?>



