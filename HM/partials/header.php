<?php
require 'config/database.php';

$avatar = "default_avatar.jpg"; // Default avatar path

if (isset($result)) {
    // Fetch the row as an associative array
    $avatarData = mysqli_fetch_assoc($result);
    // Check if the query returned any rows
    if ($avatarData) {
        $avatar = $avatarData['avatar']; // Retrieve avatar path
    } else {
        // Handle case where user ID is not found or avatar is not set
        // Log the error for debugging
        error_log("Avatar not found for user ID"); // Log error
    }
} else {
    // Log the error for debugging
    error_log("Database error: " . mysqli_error($connection)); // Log error
    // Handle query error
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    
    <title>Dashboard</title>
</head>
<body class="back">

    <!-- ===NAV BAR=== -->

    <!-- =====End of nav===== -->

    <!-- =====   ===== -->

    <script src="./js/index.js"></script>
</body>
</html>
