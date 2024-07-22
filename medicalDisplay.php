<?php
require './partials/header.php';

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$id = $_GET['id'] ?? null;

// Prepare the SQL statement to prevent SQL injection
if ($id) {
    $stmt = $connection->prepare("SELECT id, BOG, `Condition`, Immun, EmgContact, MedPic, Consent FROM medicalreport WHERE id = ?");
    $stmt->bind_param("i", $id);
} else {
    $stmt = $connection->prepare("SELECT id, BOG, `Condition`, Immun, EmgContact, MedPic, Consent FROM medicalreport");
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
    <link rel="stylesheet" href="./admin/css/main.css">

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
                    <a href="./admin/teacher.php" class="nav__link">
                        <i class='bx bx-user nav__icon'></i>
                        <span class="nav__name">Teachers</span>
                    </a>
                    
                    <a href="./admin/allStudent.php" class="nav__link">
                        <i class='bx bx-message-square-detail nav__icon'></i>
                        <span class="nav__name">Student</span>
                    </a>

                    <a href="./admin/All-Result.php" class="nav__link">
                        <i class='bx bx-bookmark nav__icon'></i>
                        <span class="nav__name">Result</span>
                    </a>

                    <a href="./admin/Add-post.php" class="nav__link">
                        <i class='bx bx-folder nav__icon'></i>
                        <span class="nav__name">Post</span>
                    </a>

                    <a href="./admin/School-fee.php" class="nav__link">
                        <i class='bx bx-bar-chart-alt-2 nav__icon'></i>
                        <span class="nav__name">School Fee</span>
                    </a>

                    <a href="./admin/newStudent.php" class="nav__link">
                        <i class='bx bx-save nav__icon'></i>
                        <span class="nav__name">New Student</span>
                    </a>
                </div>
            </div>

            <a href="./admin/login.php" class="nav__link">
                <i class='bx bx-log-out nav__icon'></i>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>

    <h2>Medical Report</h2>
    

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Blood Group</th>
                <th>Peculiar Medical Condition</th>
                <th>Immunization</th>
                <th>Emergency Contact</th>
                <th>Medical Report</th>
                <th>Consent</th>

            </tr>
        </thead>
        <tbody>
        <?php 
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = htmlspecialchars($row['id']);
                $BOG = htmlspecialchars($row['BOG']);
                $Condition = htmlspecialchars($row['Condition']);
                $Immun = ($row['Immun'] == 0) ? 'Yes' : 'No';
                $EmgContact = htmlspecialchars($row['EmgContact']);
                $MedPic = htmlspecialchars($row['MedPic']);
                $Consent = ($row['Consent'] == 0) ? 'Yes' : 'No';


                echo "<tr>
                        <td>{$id}</td>
                        <td>{$BOG}</td>
                        <td>{$Condition}</td>
                        <td>{$Immun}</td>
                        <td>{$EmgContact}</td>
                        <td><img src='./GenIMG{$MedPic}' alt='Picture' style='max-width: 100px; max-height: 100px;'></td>
                        <td>{$Consent}</td>
                      </tr>";
            }
        }else {
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
<?php
$connection->close();
?>
