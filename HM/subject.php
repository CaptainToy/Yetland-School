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
    $stmt = $connection->prepare("SELECT * FROM `subject` WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
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
    <link rel="stylesheet" href="../admin/css/main.css">

    <title>Sidebar menu responsive</title>
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
                    <a href="./Teacher.php" class="nav__link">
                        <i class='bx bx-user nav__icon'></i>
                        <span class="nav__name">Teachers</span>
                    </a>

                    <a href="./subject.php" class="nav__link active">
                        <i class='bx bx-book nav__icon'></i>
                        <span class="nav__name">Subject</span>
                    </a>

                    <a href="./Student.php" class="nav__link">
                        <i class='bx bx-message-square-detail nav__icon'></i>
                        <span class="nav__name">Student</span>
                    </a>               
                    <a href="./School-fee.php" class="nav__link">
                        <i class='bx bx-bar-chart-alt-2 nav__icon'></i>
                        <span class="nav__name">School Fee</span>
                    </a>
                    <a href="./newStudent.php" class="nav__link">
                        <i class='bx bx-save nav__icon'></i>
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

    <h2>Subject</h2>
    <button class="btn"><a href="./AddSubject.php">+Subject</a></button>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Subject Code</th>
                <th>Subject</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $query = "SELECT id, Code , Subject FROM `subject`";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = htmlspecialchars($row['id']);
                    $code = htmlspecialchars($row['Code']);
                    $subject = htmlspecialchars($row['Subject']);
                   
                    echo "<tr>
                            <td>{$id}</td>
                            <td>{$code}</td>
                            <td>{$subject}</td>
                            <td><a href='./editSubject?id={$id}' class='btn sm'><i class='bx bx-file nav__icon'></i></a></td>
                            <td><a href='./DeleteSubject.php?id={$id}' class='btn danger'><i class='bx bx-trash nav__icon'></i></a></td>
                          </tr>";
                }
            }
            $stmt->close();
            ?>
        </tbody>
    </table>
    <!--===== MAIN JS =====-->
    <script src="../admin/js/main.js"></script>
</body>
</html>
