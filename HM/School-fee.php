<?php 
require './partials/header.php';

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$id = $_GET['id'] ?? null;

// Prepare the SQL statement to prevent SQL injection
if ($id) {
    $stmt = $connection->prepare("SELECT id, Firstname, Middlename, Lastname, Gender, Studentid, Class, schoolFee, feeStatus, amountPaid FROM `allstudent` WHERE id = ?");
    $stmt->bind_param("i", $id);
} else {
    $stmt = $connection->prepare("SELECT id, Firstname, Middlename, Lastname, Gender, Studentid, Class, schoolFee, feeStatus, amountPaid FROM `allstudent`");
}

if (!$stmt) {
    die("Prepare failed: " . $connection->error);
}

$stmt->execute();
$result = $stmt->get_result();
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

    <title>All Students</title>
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

                    <a href="./subject.php" class="nav__link">
                            <i class='bx bx-book nav__icon' ></i>
                            <span class="nav__name">Subject</span>
                        </a>

                    
                    <a href="./Student.php" class="nav__link ">
                        <i class='bx bx-message-square-detail nav__icon'></i>
                        <span class="nav__name">Student</span>
                    </a>

                


                    <a href="./School-fee.php" class="nav__link active">
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

    <h2>All Students</h2>
   
    <table>
        <thead>
            <tr>
                <th>Full Name</th>
                <th>School Number</th>
                <th>Class</th>
                <th>Fee Status</th>
                <th>Amount Paid</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $fullName = htmlspecialchars($row['Firstname'] . ' ' . $row['Middlename'] . ' ' . $row['Lastname']);
                $gender = htmlspecialchars($row['Gender']);
                $studentid = htmlspecialchars($row['Studentid']);
                $class = htmlspecialchars($row['Class']);
                $feeStatus = htmlspecialchars($row['feeStatus']);
                $amountPaid = htmlspecialchars($row['amountPaid']);

                echo "<tr>
                        <td>{$fullName}</td>
                        <td>{$studentid}</td>
                        <td>{$class}</td>
                        <td>{$feeStatus}</td>
                        <td>{$amountPaid}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No data found</td></tr>";
        }
        $stmt->close();
        ?>
        </tbody>
    </table>
    <!--===== MAIN JS =====-->
    <script src="./js/main.js"></script>
</body>
</html>
