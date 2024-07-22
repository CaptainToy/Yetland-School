<?php 
require './partials/header.php';

// Ensure session is started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $connection->prepare("SELECT Role FROM teachers WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="./css/main.css">

    <title>Staff Document</title>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header__toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
        <div class="header__img">
            <img src="assets/img/perfil.jpg" alt="">
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav__logo">
                    <i class='bx bx-layer nav__logo-icon'></i>
                    <span class="nav__logo-name">Yetland's Admin</span>
                </a>
                <div class="nav__list">
                    <a href="./Teacher.php" class="nav__link active">
                        <i class='bx bx-user nav__icon'></i>
                        <span class="nav__name">Teachers</span>
                    </a>
                    <a href="./allStudent.php" class="nav__link">
                        <i class='bx bx-message-square-detail nav__icon'></i>
                        <span class="nav__name">Student</span>
                    </a>
                    <a href="./All-Result.php" class="nav__link">
                        <i class='bx bx-bookmark nav__icon'></i>
                        <span class="nav__name">Result</span>
                    </a>
                    <a href="./Add-post.php" class="nav__link">
                        <i class='bx bx-folder nav__icon'></i>
                        <span class="nav__name">Post</span>
                    </a>
                    <a href="./School-fee.php" class="nav__link">
                        <i class='bx bx-bar-chart-alt-2 nav__icon'></i>
                        <span class="nav__name">School Fee</span>
                    </a>
                    <a href="./newStudent.php" class="nav__link">
                        <i class='bx bx-save nav__icon' ></i>
                        <span class="nav__name">New Student</span>
                        </a>
                </div>
            </div>
            <a href="../login.php" class="nav__link">
                <i class='bx bx-log-out nav__icon'></i>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>

    <h2>Staffs Document</h2>
    <button class="btn"><a href="../AddTeachers.php">ADD STAFF</a></button>
    <table>
        <thead>
            <tr>
                <th>Staff ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php 
$query = "SELECT id, Staffid, fullName, email, Role, Post FROM teachers";
$stmt = $connection->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = htmlspecialchars($row['id']);
        $Staffid = htmlspecialchars($row['Staffid']);
        $fullName = htmlspecialchars($row['fullName']);
        $email = htmlspecialchars($row['email']);
        $role = ($row['Role'] == 0) ? 'Admin' : (($row['Role'] == 1) ? 'HM' : (($row['Role'] == 2) ? 'Author' : 'Teacher'));
        $post = htmlspecialchars($row['Post']);
        echo "<tr>
                <td>{$Staffid}</td>
                <td>{$fullName}</td>
                <td>{$email}</td>
                <td>{$role}</td>
                <td><a href='./editTeachers.php?id={$id}' class='btn sm'><i class='bx bx-file nav__icon'></i></a></td>
                <td><a href='./deleteTeachers.php?id={$id}' class='btn danger' onclick='return confirm(\"Are you sure you want to delete this user?\");'><i class='bx bx-trash nav__icon'></i></a></td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='7'><div style=\"display: flex; justify-content: center; align-items: center; height: 50vh; margin: 0; background-color: #f0f0f0;\">
    <div style=\"text-align: center; padding: 20px; border: 1px solid #ccc; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);\">
        <h1 style=\"font-size: 24px; color: #333;\">No Data Found</h1>
        <p style=\"font-size: 16px; color: #666;\">We couldn't find any data to display. Please check back later.</p>
    </div>
</div>
</td>
</tr>";
}
$stmt->close();
?>

        </tbody>
    </table>

    <!--===== MAIN JS =====-->
    <script src="./js/main.js"></script>
</body>
</html>
