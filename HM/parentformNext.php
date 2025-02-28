<?php
require './partials/header.php';

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$id = $_GET['id'] ?? null;

// Prepare the SQL statement to prevent SQL injection
$stmt = $connection->prepare("SELECT id, Father, FatherNumber, Mother, MothersNumber, Email, Religion, Address FROM parentinfo");
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

    <title>New Student</title>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header__toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
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
                    <a href="./Teacher.php" class="nav__link ">
                        <i class='bx bx-user nav__icon'></i>
                        <span class="nav__name">Teachers</span>
                    </a>

                    <a href="./subject.php" class="nav__link">
                            <i class='bx bx-book nav__icon' ></i>
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
                    <a href="./newStudent.php" class="nav__link active">
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

    <h2>New Student</h2>
    <h2 style=" color:white; border: 1px solid black; padding:10px 15px; width: 100px; border-radius: 20px; padding: 10px 20px; font-size: 20px;"><a href='./medicalDisplay.php'>Next</a></h2>

    <table>
        <thead>
            <tr>
                <th>Father's Name</th>
                <th>Father's Number</th>
                <th>Mother's Name</th>
                <th>Mother's Number</th>
                <th>Email</th>
                <th>Religion</th>
                <th>Address</th>
                <th>Delete</th>

            </tr>
        </thead>
        <tbody>
        <?php 
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = htmlspecialchars($row['id']);
                $Father = htmlspecialchars($row['Father']);
                $FatherNumber = htmlspecialchars($row['FatherNumber']);
                $Mother = htmlspecialchars($row['Mother']);
                $MothersNumber = htmlspecialchars($row['MothersNumber']);
                $Email = htmlspecialchars($row['Email']);
                $Religion = ($row['Religion'] == 0) ? 'Christian' : 'Muslim';
                $Address = htmlspecialchars($row['Address']);

                echo "<tr>
                        <td>{$Father}</td>
                        <td>{$FatherNumber}</td>
                        <td>{$Mother}</td>
                        <td>{$MothersNumber}</td>
                        <td>{$Email}</td>
                        <td>{$Religion}</td>
                        <td>{$Address}</td>
                                                <td>Delete</td>

                        
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No data found</td></tr>";
        }
        $stmt->close();
        ?>
        </tbody>
    </table>
    <!--===== MAIN JS =====-->
    <script src="./js/main.js"></script>
</body>
</html>
<?php
$connection->close();
?>
